<?php

namespace App\Controllers;

use App\Models\Article as BlogAlias;

class AjaxBlog extends Administered
{
    /**
     *  Fetch records
     */
    public function fetchContents(){

        if(isset($_POST['readrecord'])){
            $data = '<table class="table table-bordered">                
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Articles</th>
                          <th scope="col">Edit</th>
                          <th scope="col">Delete</th>
                        </tr>';

            $arr = BlogAlias::fetchAll();

            $num = count($arr);

            if($num>0){

                foreach($arr as $row) {
                    $data .= '<tr>
                    <td>'.$row->id.'</td>                          
                    <td><span><i class="fa fa-chrome icon-web"  aria-hidden="true"></i></span> <a href="/admin/article?id='.$row->id.'">'.$row->title.'</a></td>';

//                    if($row['publish']==0){
//                        $data .=
//                            '<td><button onclick="publishContent('.$row->id.')" type="button" class="mb-1 btn btn-sm btn-success">Publish</button></td>';
//                    }else{
//                        $data .='<td><button onclick="unPublishContent('.$row->id.')" type="button" class="mb-1 btn btn-sm btn-warning ">Bublish</button></td>';
//                    }

                    $data .=
                        '<td><button onclick="getContentInfo('.$row->id.')" type="button" class="mb-1 btn btn-sm btn-info">Edit</button></td>                 
                    <td><button onclick="deleteContentInfo('.$row->id.')" type="button" class="mb-1 btn btn-sm btn-danger">Del</button></td>
                    </tr>';
                }

            }

            $data .='</table>';
            echo $data;

        }
    }

    /**
     *  Fetch record
     */
    public function fetchSingleContentRecord(){

        if(isset($_POST['contentId']) && isset($_POST['contentId'])!=''){

            $content_id = $_POST['contentId'];
            $contentInfo = BlogAlias::fetchTitle($content_id);
            $num = count($contentInfo);
            if($num>0){
                $response = $contentInfo;
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
    public function updateSingleContentRecord(){

        if(isset($_POST['id'])){

            $re = BlogAlias::updateTitle($_POST);
            if(!$re){
                echo 'Something went Wrong';
            }
            echo 'Basic Info Updated';

        }
    }




}