<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Obat
 *
 * @author RIFANI
 */
class Obat extends CI_Controller{
    function outlet_json(){
        $name=$this->input->get('name');
                $address= $this->input->get('address');
                $phone_no=$this->input->get('phone_no');
                
                //loadmodel
                $this->load->model('Apotek_m',NULL);
                $data['data']=array();
                 $rest= $this->Apotek_m->outlet($name,$address,$phone_no)->result();
                 foreach ($rest as $value){
                     $json=array();
                     $json['name']=$value->name;
                     $json['address']=$value->address;
                     $json['phone_no']=$value->phone_no;
                    
                     array_push($data['data'],$json);
                 }
                 print json_encode($data);
    }
    function cari_outlet_json(){
        $name=$this->input->get('name');
                //loadmodel
                $this->load->model('Apotek_m',NULL);
                $data['data']=array();
                 $rest= $this->Apotek_m->cari_outlet($name)->result();
                 foreach ($rest as $value){
                     $json=array();
                     $json['name']=$value->name;
                     $json['address']=$value->address;
                     $json['phone_no']=$value->phone_no;
                     array_push($data['data'],$json);
                 }
                 print json_encode($data);
    }
    function obat_json(){
      
                $this->load->model('Apotek_m',NULL);
                $data['data']=array();
                 $rest= $this->Apotek_m->obatt()->result();
                 foreach ($rest as $value){
                     $json=array();
                     $json['meds_type_id']=$value->meds_type_id;
                     $json['price']=$value->price;
                     $json['name']=$value->name;
                    
                     array_push($data['data'],$json);
                 }
                 print json_encode($data);
    }
    function cari_obat_json(){
      $name=$this->input->get('name');
                $this->load->model('Apotek_m',NULL);
                $data['data']=array();
                 $rest= $this->Apotek_m->cari_obatt($name)->result();
                 foreach ($rest as $value){
                     $json=array();
                     $json['meds_type_id']=$value->meds_type_id;
                     $json['price']=$value->price;
                     $json['name']=$value->name;
                    
                     array_push($data['data'],$json);
                 }
                 print json_encode($data);
    }
     function transaksi_json(){
      
                $this->load->model('Apotek_m',NULL);
                $data['data']=array();
                 $rest= $this->Apotek_m->transaksi()->result();
                 foreach ($rest as $value){
                     $json=array();
                     $json['id']=$value->id;
                     $json['staff_id']=$value->staff_id;
                     $json['customer_id']=$value->customer_id;
                     $json['doctor_id']=$value->doctor_id;
                    $json['name']=$value->name;
                     $json['subtotal']=$value->subtotal;
                     $json['tax']=$value->tax;
                     $json['pay_amt']=$value->pay_amt;
                    
                     array_push($data['data'],$json);
                 }
                 print json_encode($data);
    }
    function tambah_murid(){
        $this->load->model("Apotek_m",NULL);
        
        $nama = $this->input->get('nama');
        $positif = $this->input->get('positif');
        $meninggal = $this->input->get('meninggal');
        $sembuh = $this->input->get('sembuh');
      
        
        $res = $this->Apotek_m->tambah_murid($nama,$positif,$meninggal,$sembuh);
        if ($res > 0){
            $data['message']="Berhasil menambah data murid";
            print json_encode($data);
        }else{
            $data['message']="Error saat memproses data";
            print json_encode($data);
        }
    }
}
