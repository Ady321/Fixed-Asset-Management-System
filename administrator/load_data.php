<?php
    require('../func/config.php');
    if(!$user->is_logged_in()){ header('Location: login'); }
    global $db;
    $output ='';
    
    if(isset($_POST['location_id'])){
        if($_POST['location_id']!=''){
            
        $stmt1 = mysqli_query($db, "select a.loc_id,l.Location_name,u.user_Name,a.TagId,c.cat_Name,c.Color,a.asset_name,m.manu_name,sc.Name,a.serial_no,ac.Conditions from asset a,sub_category sc,asset_condition ac,category c,manufactures m,users u,locations l where l.loc_id=a.loc_id and u.Id=a.Id and a.con_id=ac.con_id and sc.sub_id=a.sub_id and sc.category_Id=c.category_Id and m.manu_id=sc.manu_id and a.loc_id='".$_POST['location_id']."'");
        if(mysqli_num_rows($stmt1)>0){
            $output.= '<form method="POST" action="exportData.php">';
            $output.= '<table id="dynamic-table" class="table table-striped table-bordered table-hover">';
            $output.= '<thead>
                <tr>
                    <th>Tag Id</th>
                    <th>Category</th>
                    <th>Asset Name</th>
                    <th>Model</th>
                    <th>Serial Number</th>
                    <th>Condition</th>
                    <th>Assigned User</th>
                    <th>Location</th>
                </tr>
            </thead><tbody>';
            while ($row_loc = mysqli_fetch_array($stmt1)){
                $output.= '<tr><td>'.$row_loc['TagId'].'</td>';
                $output.= '<td><span class="lab1 style="background-color: #FFF;color:'.$row_loc['Color'].';border: 1px solid:'.$row_loc['Color'].'">'.$row_loc['cat_Name'].'</span></td>';
                $output.= '<td>'.$row_loc['asset_name'].'</td>
                    <td>'.$row_loc['manu_name'].' '.$row_loc['Name'].'</td>
                    <td>'.$row_loc['serial_no'].'</td>
                    <td>'.$row_loc['Conditions'].'</td>
                    <td>'.$row_loc['user_Name'].'</td>
                    <td><input type="hidden" value='.$row_loc['loc_id'].' name="lol">'.$row_loc['Location_name'].'</td></tr>';
            }
            $output.='</tbody></table>
            <input type="submit" name="export" value="Export xls By Location" class="btn btn-success"></form>';
            
        }else{
            $output.="No Recodrs are found";
        }
    }
    }
    echo $output;
