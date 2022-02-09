<?php

namespace App\Controllers;

use App\Models\Template;

class AjaxTemplate extends Administered
{

    /**
     * Search templates dynamically
     */
    public function fetchTemplatesAction(){

        $limit = 10;
        $page = 1;
        $type = $_POST['category'];

        if($_POST['page'] > 1){
            $start = (($_POST['page']-1) * $limit);
            $page = $_POST['page'];
        }else{
            $start = 0;
        }

        $results = Template::liveSearchType($start,$limit,$type);
        $total_data = Template::liveSearchTypeCount($type);

        $output = '<label>Total Records - '.$total_data.'</label>
            <table class="table table-striped table-bordered">
                <tr>
                    <th>id</th>                     
                    <th>Name</th>                                  
                    <th>Language</th>
                    <th>Content</th>                                                                                      
                    <th>Edit</th>                    
                </tr>';

        if($total_data > 0){

            foreach($results as $row){
                $output .= '<tr>
                <td>'.$row->id.'</td>                
                <td>'.$row->name.'</td>                                
                <td>'.$row->lang.'</td>
                <td>'.$row->content.'</td>
                <td><button onclick="getTemplateInfo('.$row->id.')" type="button" class="mb-1 btn btn-sm btn-info">Edit</button></td>              
                </tr>';
            }

        }
        else{

            $output .= '<tr><td colspan="12">No data found</td></tr>';

        }

        $output .= '</table></br>
            <div align="center">
                <ul class="pagination">
        ';

        $total_links = ceil($total_data/$limit);
        $previous_link = '';
        $next_link = '';
        $page_link ='';
        if(!$total_data){
            $page_array[]=1;
        }

        if($total_links > 4){
            if($page<5){
                for($count=1; $count<=5; $count++){

                    $page_array[]=$count;
                }
                $page_array[]='...';
                $page_array[]=$total_links;
            }else{
                $end_limit = $total_links - 5 ;
                if($page > $end_limit){

                    $page_array[] = 1;
                    $page_array[] = '...';

                    for($count=$end_limit; $count<=$total_links; $count++){
                        $page_array[]=$count;
                    }
                }else{
                    $page_array[]=1;
                    $page_array[]='...';
                    for($count = $page-1; $count<=$page+1; $count++){
                        $page_array[]=$count;
                    }
                    $page_array[]='...';
                    $page_array[]=$total_links;
                }
            }
        }
        else{
            for($count=1; $count <= $total_links; $count++){
                $page_array[] = $count;
            }
        }
        // checked

        for($count = 0; $count < count($page_array); $count++)
        {
            if($page == $page_array[$count])
            {
                $page_link .= '<li class="page-item active">
                      <a class="page-link" href="#">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
                    </li>
                    ';

                $previous_id = $page_array[$count] - 1;
                if($previous_id > 0)
                {
                    $previous_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$previous_id.'">Previous</a></li>';
                }
                else
                {
                    $previous_link = '<li class="page-item disabled">
                        <a class="page-link" href="#">Previous</a>
                      </li>
                      ';
                }
                $next_id = $page_array[$count] + 1;
                if($next_id >= $total_links)
                {
                    $next_link = '<li class="page-item disabled">
                        <a class="page-link" href="#">Next</a>
                      </li>';
                }
                else
                {
                    $next_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$next_id.'">Next</a></li>';
                }
            }
            else
            {
                if($page_array[$count] == '...')
                {
                    $page_link .= '
                      <li class="page-item disabled">
                          <a class="page-link" href="#">...</a>
                      </li>
                      ';
                }
                else
                {
                    $page_link .= '<li class="page-item"><a class="page-link" href="javascript:void(0)" 
                    data-page_number="'.$page_array[$count].'">'.$page_array[$count].'</a></li>';
                }
            }
        }

        $output .= $previous_link . $page_link . $next_link;
        $output .= '</ul></div>';

        echo $output;
    }


    /**
     *  Fetch record
     */
    public function fetchSingleTemplate(){

        if(isset($_POST['templateId']) && isset($_POST['templateId'])!=''){

            $template_id = $_POST['templateId'];
            $templateInfo = Template::fetchTemplate($template_id);
            $num = count($templateInfo);
            if($num>0){
                $response = $templateInfo;
            }else{
                $response['status']=200;
                $response['message']="No data found!";
            }
            echo json_encode($response);

        }
    }

    /**
     *  Update record
     */
    public function updateSingleTemplate(){

        if(isset($_POST['id'])){

            $re = Template::updateTemplate($_POST);
            if(!$re){
                echo 'Something went Wrong';
            }
            echo 'Basic Info Updated';

        }
    }

    /**
     *  Add record
     */
    public function insertNewTemplateRecord(){

        if(isset($_POST['name']) && $_POST['name']!=''){

            $re = Template::insertTemplate($_POST);
            if(!$re){
                echo 'Something went Wrong';
            }
            echo 'New Content Created';

        }
    }

}