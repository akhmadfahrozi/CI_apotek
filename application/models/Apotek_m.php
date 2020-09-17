<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Apotek_m
 *
 * @author RIFANI
 */
class Apotek_m extends CI_Model {
   
    function outlet(){
        $outlet= $this->db->query("select * from outlet");
        return$outlet;
    }
     function cari_outlet($name){
        $cari_outlet= $this->db->query("select * from outlet WHERE name LIKE'%$name%'");
        return$cari_outlet;
    }
     function obatt(){
        $obatt= $this->db->query("select * from medicine");
        return$obatt;
    }
    function cari_obatt($name){
        $cari_obatt= $this->db->query("select * from medicine WHERE name LIKE'%$name%");
        return$cari_obatt;
    }
     function transaksi(){
        $transaksi= $this->db->query("select * from transaction ,users");
        return$transaksi;
    }
    function tambah_murid($nama, $positif, $meninggal, $sembuh) {
        $data = array(
            'nama'=>$nama,
            'positif' => $positif,
            'meninggal' => $meninggal,
            'sembuh' => $sembuh,
            
        );
        $this->db->insert('mahasiswa', $data);
        return $this->db->affected_rows();

}
    
    //disesuaikan table database
}

