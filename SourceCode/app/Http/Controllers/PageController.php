<?php

namespace App\Http\Controllers;
use App\Slide;
use App\Product;
use App\ProductType;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function getIndex(){
        $slide= Slide::all();
       /* print($slide);*/
        // truyen bieens/*
         /* return view('page.trangchu',['slide'=>$slide];*/
       $new_product = Product::where('new',1)->get();
       $sanpham_khuyenmai=Product::where('promotion_price','<>',0)->get();
       /*dd($new_product);*/
        return view('page.trangchu',compact('slide','new_product','sanpham_khuyenmai'));

    }



     public function getLoaiSp($type){
        $sp_theoloai=Product::where('id_type',$type)->get();
          $sp_khac=Product::where('id_type','<>',$type)->get();
          $loai=ProductType::all();
          $loap_sp=ProductType::where('id',$type)->first();
        return view('page.loai_sanpham',compact('sp_theoloai','sp_khac','loai','loap_sp'));
    }


     public function getChitiet(Request $req){
        $sanpham=Product::where('id',$req->id)->first();
        $sp_tuongtu=Product::where('id_type',$sanpham->id_type)->get();


        return view('page.chitiet_sanpham',compact('sanpham','sp_tuongtu'));
    }

     public function getLienHe(){
        return view('page.lienhe');
    }

      public function getGioithieu(){
        return view('page.gioithieu');
    }
    // /*/**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index()
    // {
    //     //
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     //
    // }*/
}
