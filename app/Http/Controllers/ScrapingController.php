<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ScrapingInsert;
use App\ScrapingSelect;
use PhpParser\Node\Expr\Print_;

class ScrapingController extends Controller
{
    function pesqScraping(Request $req){

        require('simplehtmldom/simple_html_dom.php');

        $this->validate($req, [

            'titulo'          =>'required | min:3',
        ],
        [
            'titulo.required'    => 'Escreva um título!',
            'titulo.min'         => 'Título deve ter ao menos 3 caracters!',
        ]
        );

        $keywords = $req->titulo;

        $keywords = explode(',', $keywords);
        $keywords = str_replace(" ", "%20", $keywords);

        $i = 1;
        foreach($keywords as $keyword)
        {

            //PESQUISAR DENTRO DO SITE
            $html = file_get_html('https://uplexis.com.br/category/blog/?s='.$keyword);

            //BUSCAR REFERENCIA PEL TITULO
                foreach($html->find('div[class=title]') as $dataTitle){

                    //BUSCAR LINK REFERENCIA PELA CLASSE
                    foreach($html->find('a[class=btn-uplexis orange]') as $dataUrl){

                        $title[$i] = $dataTitle->plaintext;
                        $url[$i] = $dataUrl->href;
                    }

                    try{
                        //ARMAZENAR NO BANCO DE DADOS
                        $data = new ScrapingInsert();
                        $data->id_usuario = 1;
                        $data->titulo = $title[$i];
                        $data->link = $url[$i];
                        $data->created_at = now();
                        $data->updated_at = null;
                        $data->save();

                    }catch(\Exception $e){
                        return view('retorno',['title'=>$result[0], 'url'=>$result[1], 'keyword'=>$req->titulo])->with('error_msg','Falha ao registrar dados no banco, tente mais tarde.');
                    }

                    $i++;
                }
                    $result = array($title, $url);



                    return view('retorno',['title'=>$result[0], 'url'=>$result[1], 'keyword'=>$req->titulo])->with('success_msg','Pesquisa realizada com sucesso! Dados registrado no banco, confira na página listar.');
        }
    }

    function returnData(){

        $data = ScrapingSelect::all();

        return view('list',['valores'=> $data]);

    }
}
