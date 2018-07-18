<?php

require('../func/config.php');
	if(!$user->is_logged_in()){ header('Location: login'); }
        global $db;
        $output = '';
        if(isset($_POST['export1'])){
            $con=$_POST['con'];
            //header('Content-Type: text/csv; charset=utf-8');  
            //header('Content-Disposition: attachment; filename=data.csv');  
            //$output = fopen("php://output", "w");  
            //fputcsv($output, array('TagId', 'Serial Number','Category', 'Model Name', 'Manufacture', 'Condition', 'Location','Purchase Price','Quantity','Purchase Date','Supplier','Supplier Date','Warranty Start','Warranty End','Assigned User','Title','Team'));
            $stmt= mysqli_query($db,"select u.job_title,d.Name as dept_name,u.user_Name,l.Location_name,a.quan,sc.Price,sc.warranty_end,sc.Purchase_date,sc.Supplier_date,sc.warranty_start,s.sup_Name,a.TagId,a.serial_no,c.Color,c.cat_Name,a.asset_name,m.manu_name,sc.Name,ac.Conditions from users u,suppliers s,locations l,asset a,sub_category sc,asset_condition ac,category c,manufactures m,dept_teams d where d.dept_id=u.dept_id and a.sup_id=s.sup_id and a.loc_id=l.loc_id and a.con_id=ac.con_id and sc.sub_id=a.sub_id and 
                    sc.category_Id=c.category_Id and m.manu_id=sc.manu_id and a.loc_id='".$con."' and u.Id=a.Id");
            /*while($row = mysqli_fetch_assoc($stmt)){
                $pu_date= date('jS M Y', strtotime($row['Purchase_date']));
                $su_date= date('jS M Y', strtotime($row['Supplier_date']));
                $wst_date= date('jS M Y', strtotime($row['warranty_start']));
                $wen_date= date('jS M Y', strtotime($row['warranty_end']));
                $linedata = array($row['TagId'],$row['serial_no'],$row['cat_Name'],$row['Name'],$row['manu_name'],$row['Conditions'],$row['Location_name'],$row['Price'],$row['quan'],$pu_date,$row['sup_Name'],$su_date,$wst_date,$wen_date,$row['user_Name'],$row['job_title'],$row['dept_name']);
            
                fputcsv($output, $linedata);
            }
            fclose($output);*/
            if(mysqli_num_rows($stmt)>0){
            $output.= '<table id="dynamic-table" class="table table-striped table-bordered table-hover" border="1">';
            $output.= '<thead>
                <tr>
                    <th>Tag Id</th>
                    <th>Serial Number</th>
                    <th>Category</th>
                    <th>Asset Name</th>
                    <th>Model Name</th>
                    <th>Manufacture</th>
                    <th>Condition</th>
                    <th>Location</th>
                    <th>Purchase Price</th>
                    <th>Quantity</th>
                    <th>Purchase Date</th>
                    <th>Supplier</th>
                    <th>Supplier Date</th>
                    <th>Warranty Start</th>
                    <th>Warranty Expiry</th>
                    <th>Assigned User</th>
                    <th>Title</th>
                    <th>Team</th>
                </tr>
            </thead><tbody>';
            while ($row_con = mysqli_fetch_array($stmt)){
                $pu_date= date('jS M Y', strtotime($row_con['Purchase_date']));
                $su_date= date('jS M Y', strtotime($row_con['Supplier_date']));
                $wst_date= date('jS M Y', strtotime($row_con['warranty_start']));
                $wen_date= date('jS M Y', strtotime($row_con['warranty_end']));
                $output.= '<tr><td>'.$row_con['TagId'].'</td>
                        <td>'.$row_con['serial_no'].'</td>';
                $output.= '<td><span class="lab1 style="background-color: #FFF;color:'.$row_con['Color'].';border: 1px solid:'.$row_con['Color'].'">'.$row_con['cat_Name'].'</span></td>';
                $output.= '<td>'.$row_con['asset_name'].'</td>
                           <td>'.$row_con['Name'].'</td>
                           <td>'.$row_con['manu_name'].'</td>
                    <td>'.$row_con['Conditions'].'</td>
                    <td>'.$row_con['Location_name'].'</td>
                    <td>'.$row_con['Price'].'</td>
                    <td>'.$row_con['quan'].'</td>
                    <td>'.$pu_date.'</td>
                    <td>'.$row_con['sup_Name'].'</td>
                    <td>'.$su_date.'</td>
                    <td>'.$wst_date.'</td>
                    <td>'.$wen_date.'</td>
                    <td>'.$row_con['user_Name'].'</td>
                    <td>'.$row_con['job_title'].'</td>
                    <td>'.$row_con['dept_name'].'</td></tr>';
            }
            $output.='</tbody></table>';
             header('Content-Type: application/xls');
             header('Content-Disposition: attachment; filename=Report_By_Condition.xls');
             echo $output;
            
        }   
            
        }
  ?>

