<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function get_user($username, $password)
    {
        $belajarapi = $this->load->database('belajarapi', TRUE);
        $belajarapi->select('username,nama');
        $pass = md5($password);
        $belajarapi->where('username', $username);
        $belajarapi->where('password', $pass);
        $qryget = $belajarapi->get('user');
        $belajarapi->close();
        return $qryget;
    }

    function addBerita($judul, $pembaca)
    {
        $belajarapi = $this->load->database('belajarapi', TRUE);
        $berita = array(
            'judul' => $judul,
            'pembaca' => $pembaca
        );
        $belajarapi->insert('berita', $berita);
        $belajarapi->close();
        return $belajarapi;
    }

    function addTabelBerita($judul, $isi, $jumlah)
    {
        $belajar = $this->load->database('belajar', TRUE);
        $berita = array(
            'judul' => $judul,
            'isi' => $isi,
            'jumlah' => $jumlah
        );
        $belajar->insert('tbl_berita', $berita);
        $belajar->close();
        return $belajar;
    }

    function updateBerita($id, $judul, $isi, $jumlah)
    {
        $belajar = $this->load->database('belajar', TRUE);
        $berita = array(
            'judul' => $judul,
            'isi' => $isi,
            'jumlah' => $jumlah
        );
        $belajar->where('id', $id);
        $belajar->update('tbl_berita', $berita);
        $belajar->close();
        return $belajar;
    }

    function deleteBerita($id)
    {
        $belajar = $this->load->database('belajar', TRUE);
        $belajar->where('id', $id);
        $belajar->delete('tbl_berita');
        $belajar->close();
        return $belajar;
    }

    function addBarang($nama, $merk, $harga, $kategori, $jumlah)
    {
        $belajar = $this->load->database('belajar', TRUE);
        $barang = array(
            'nama_barang' => $nama,
            'harga' => $harga,
            'kategori' => $kategori,
            'jumlah_barang' => $jumlah,
            'merk' => $merk
        );
        $belajar->insert('tbl_barang', $barang);
        $belajar->close();
        return $belajar;
    }

    function addKategori($kategori)
    {
        $belajar = $this->load->database('belajarci', TRUE);
        $row = array(
            'kategori' => $kategori
        );
        $belajar->insert('tbl_kategori', $row);
        $belajar->close();
        return $belajar;
    }

    function addMerk($merk)
    {
        $belajar = $this->load->database('belajarci', TRUE);
        $row = array(
            'merk' => $merk
        );
        $belajar->insert('tbl_merk', $row);
        $belajar->close();
        return $belajar;
    }

    function addStok($nama, $jumlah, $merk, $jenis)
    {
        $belajar = $this->load->database('belajarci', TRUE);
        $row = array(
            'nama_barang' => $nama,
            'jumlah_barang' => $jumlah,
            'merk' => $merk,
            'jenis' => $jenis
        );
        $belajar->insert('tbl_stok', $row);
        $belajar->close();
        return $belajar;
    }


    function getAllUser()
    {
        $belajarapi = $this->load->database('belajarapi', TRUE);
        $belajarapi->select('username,nama,email,phone');
        $qryget = $belajarapi->get('user');
        $belajarapi->close();
        return $qryget;
    }

    function getAllUserBelajar()
    {
        $belajarci = $this->load->database('belajarci', TRUE);
        $belajarci->select('username,nama');
        $qryget = $belajarci->get('tbl_user');
        $belajarci->close();
        return $qryget;
    }

    function getUser($username)
    {
        $belajarapi = $this->load->database('belajarapi', TRUE);
        $belajarapi->select('username,nama,email,phone,bio,password');
        $belajarapi->where('username', $username);
        $qryget = $belajarapi->get('user');
        $belajarapi->close();
        return $qryget;
    }

    function getBarang()
    {
        $belajar = $this->load->database('belajar', TRUE);
        $belajar->select('nama_barang,harga,kategori,jumlah_barang,merk');
        $qryget = $belajar->get('tbl_barang');
        $belajar->close();
        return $qryget;
    }

    function getBerita()
    {
        $belajar = $this->load->database('belajar', TRUE);
        $belajar->select('id,judul,isi,jumlah');
        $qryget = $belajar->get('tbl_berita');
        $belajar->close();
        return $qryget;
    }

    function getKategori()
    {
        $belajar = $this->load->database('belajar', TRUE);
        $belajar->select('kategori');
        $qryget = $belajar->get('tbl_kategori');
        $belajar->close();
        return $qryget;
    }

    function getMerk()
    {
        $belajar = $this->load->database('belajar', TRUE);
        $belajar->select('merk');
        $qryget = $belajar->get('tbl_merk');
        $belajar->close();
        return $qryget;
    }

    function getStok()
    {
        $belajar = $this->load->database('belajar', TRUE);
        $belajar->select('nama_barang, jumlah_barang, merk, jenis');
        $qryget = $belajar->get('tbl_stok');
        $belajar->close();
        return $qryget;
    }

    function postUser($id_user)
    {
        $belajarapi = $this->load->database('belajarapi', TRUE);
        $belajarapi->select('*');
        $belajarapi->where('id_user', $id_user);
        $qryget = $belajarapi->get('user');
        $belajarapi->close();
        return $qryget;
    }

    function cek_user($username)
    {
        $belajarapi = $this->load->database('belajarapi', TRUE);
        $belajarapi->select('username');
        $belajarapi->where('username', $username);
        $qryget = $belajarapi->get('user');
        $belajarapi->close();
        return $qryget;
    }

    function cek_nohp($nohp)
    {
        $belajarapi = $this->load->database('belajarapi', TRUE);
        $belajarapi->select('phone');
        $belajarapi->where('phone', $nohp);
        $qryget = $belajarapi->get('user');
        $belajarapi->close();
        return $qryget;
    }

    function cek_pw($username)
    {
        $belajarapi = $this->load->database('belajarapi', TRUE);
        $belajarapi->select('password');
        $belajarapi->where('username', $username);
        $qryget = $belajarapi->get('user');
        $belajarapi->close();
        return $qryget->row();
    }

    function cek_fielduser($field, $username)
    {
        $belajarapi = $this->load->database('belajarapi', TRUE);
        $belajarapi->select($field);
        $belajarapi->where('username', $username);
        $qryget = $belajarapi->get('user');
        $belajarapi->close();
        return $qryget->row();
    }

    function create_user($username, $nama, $password, $email, $phone, $foto)
    {
        $belajarapi = $this->load->database('belajarapi', TRUE);
        $pass = md5($password);
        $data = array(
            'username' => $username,
            'nama' => $nama,
            'password' => $pass,
            'email' => $email,
            'phone' => $phone,
            'foto' => $foto
        );
        $belajarapi->insert('user', $data);
        $belajarapi->close();
        return $belajarapi;
    }
}
