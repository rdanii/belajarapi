<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


function addBerita($request)
{
    $result = new stdClass;
    $result->responseCode = "";
    $result->responseDesc = "";

    $CI = &get_instance();
    $CI->load->model('user_model');
    $CI->load->model('activity_model');
    $datapost = json_decode($request);
    try {
        if (!isset($datapost->judul)) {
            throw new Exception("Parameter Judul tidak valid");
        }
        if ($datapost->judul == "") {
            throw new Exception("Judul tidak boleh kosong");
        }
        $judul = $datapost->judul;

        if (!isset($datapost->pembaca)) {
            throw new Exception("Parameter Pembaca tidak valid");
        }
        if ($datapost->pembaca == "") {
            throw new Exception("Pembaca tidak boleh kosong");
        }
        $pembaca = $datapost->pembaca;

        $resdata = $CI->user_model->addBerita($judul, $pembaca);
        if (!$resdata) {
            throw new Exception("Gagal add berita");
        }

        $result->responseCode = '00';
        $result->responseDesc = 'Berhasil Add Berita';
    } catch (Exception $e) {
        $result->responseCode = '99';
        $result->responseDesc = $e->getMessage() . " Ln." . $e->getLine();
    }

    $CI->activity_model->insert_activity((isset($datapost->requestMethod) ? $CI->security->xss_clean(trim($datapost->requestMethod)) : '') . ' RESPONSE ', json_encode(array("responseCode" => $result->responseCode, "responseDesc" => $result->responseDesc)));
    return $result;
}


function addTabelBerita($request)
{
    $result = new stdClass;
    $result->responseCode = "";
    $result->responseDesc = "";

    $CI = &get_instance();
    $CI->load->model('user_model');
    $CI->load->model('activity_model');
    $datapost = json_decode($request);
    try {
        if (!isset($datapost->judul)) {
            throw new Exception("Parameter judul tidak ditemukan");
        }
        if ($datapost->judul == "") {
            throw new Exception("Judul tidak boleh kosong");
        }
        $judul = $datapost->judul;

        if (!isset($datapost->isi)) {
            throw new Exception("Parameter isi tidak valid");
        }
        if ($datapost->isi == "") {
            throw new Exception("Isi tidak boleh kosong");
        }
        $isi = $datapost->isi;

        if (!isset($datapost->jumlah)) {
            throw new Exception("Parameter jumlah tidak valid");
        }
        if ($datapost->jumlah == "") {
            throw new Exception("Jumlah tidak boleh kosong");
        }
        $jumlah = $datapost->jumlah;

        $resdata = $CI->user_model->addTabelBerita($judul, $isi, $jumlah);
        if (!$resdata) {
            throw new Exception("Gagal add berita");
        }

        $result->responseCode = '00';
        $result->responseDesc = 'Berhasil add Berita';
    } catch (Exception $e) {
        $result->responseCode = '99';
        $result->responseDesc = $e->getMessage() . " Ln." . $e->getLine();
    }

    $CI->activity_model->insert_activity((isset($datapost->requestMethod) ? $CI->security->xss_clean(trim($datapost->requestMethod)) : '') . ' RESPONSE ', json_encode(array("responseCode" => $result->responseCode, "responseDesc" => $result->responseDesc)));
    return $result;
}

function updateBerita($request)
{
    $result = new stdClass;
    $result->responseCode = "";
    $result->responseDesc = "";

    $CI = &get_instance();
    $CI->load->model('user_model');
    $CI->load->model('activity_model');
    $datapost = json_decode($request);
    try {
        if (!isset($datapost->id)) {
            throw new Exception("Parameter id tidak ditemukan");
        }
        if ($datapost->id == "") {
            throw new Exception("id tidak boleh kosong");
        }
        $id = $datapost->id;

        if (!isset($datapost->judul)) {
            throw new Exception("Parameter judul tidak ditemukan");
        }
        if ($datapost->judul == "") {
            throw new Exception("Judul tidak boleh kosong");
        }
        $judul = $datapost->judul;

        if (!isset($datapost->isi)) {
            throw new Exception("Parameter isi tidak valid");
        }
        if ($datapost->isi == "") {
            throw new Exception("Isi tidak boleh kosong");
        }
        $isi = $datapost->isi;

        if (!isset($datapost->jumlah)) {
            throw new Exception("Parameter jumlah tidak valid");
        }
        if ($datapost->jumlah == "") {
            throw new Exception("Jumlah tidak boleh kosong");
        }
        $jumlah = $datapost->jumlah;

        $resdata = $CI->user_model->updateBerita($id, $judul, $isi, $jumlah);
        if (!$resdata) {
            throw new Exception("Gagal update berita");
        }

        $result->responseCode = '00';
        $result->responseDesc = 'Berhasil update Berita';
    } catch (Exception $e) {
        $result->responseCode = '99';
        $result->responseDesc = $e->getMessage() . " Ln." . $e->getLine();
    }

    $CI->activity_model->insert_activity((isset($datapost->requestMethod) ? $CI->security->xss_clean(trim($datapost->requestMethod)) : '') . ' RESPONSE ', json_encode(array("responseCode" => $result->responseCode, "responseDesc" => $result->responseDesc)));
    return $result;
}

function updateBarang($request)
{
    $result = new stdClass;
    $result->responseCode = "";
    $result->responseDesc = "";

    $CI = &get_instance();
    $CI->load->model('user_model');
    $CI->load->model('activity_model');
    $datapost = json_decode($request);
    try {
        if (!isset($datapost->id)) {
            throw new Exception("Parameter id tidak ditemukan");
        }
        if ($datapost->id == "") {
            throw new Exception("id tidak boleh kosong");
        }
        $id = $datapost->id;

        if (!isset($datapost->nama)) {
            throw new Exception("Parameter nama tidak ditemukan");
        }
        if ($datapost->nama == "") {
            throw new Exception("nama tidak boleh kosong");
        }
        $nama = $datapost->nama;

        if (!isset($datapost->harga)) {
            throw new Exception("Parameter harga tidak valid");
        }
        if ($datapost->harga == "") {
            throw new Exception("harga tidak boleh kosong");
        }
        $harga = $datapost->harga;

        if (!isset($datapost->kategori)) {
            throw new Exception("Parameter kategori tidak valid");
        }
        if ($datapost->kategori == "") {
            throw new Exception("kategori tidak boleh kosong");
        }
        $kategori = $datapost->kategori;

        if (!isset($datapost->jumlah)) {
            throw new Exception("Parameter jumlah tidak valid");
        }
        if ($datapost->jumlah == "") {
            throw new Exception("Jumlah tidak boleh kosong");
        }
        $jumlah = $datapost->jumlah;

        if (!isset($datapost->merk)) {
            throw new Exception("Parameter merk tidak valid");
        }
        if ($datapost->merk == "") {
            throw new Exception("merk tidak boleh kosong");
        }
        $merk = $datapost->merk;

        $resdata = $CI->user_model->updateBarang($id, $nama, $harga, $kategori, $jumlah, $merk);
        if (!$resdata) {
            throw new Exception("Gagal update Barang");
        }

        $result->responseCode = '00';
        $result->responseDesc = 'Berhasil update Barang';
    } catch (Exception $e) {
        $result->responseCode = '99';
        $result->responseDesc = $e->getMessage() . " Ln." . $e->getLine();
    }

    $CI->activity_model->insert_activity((isset($datapost->requestMethod) ? $CI->security->xss_clean(trim($datapost->requestMethod)) : '') . ' RESPONSE ', json_encode(array("responseCode" => $result->responseCode, "responseDesc" => $result->responseDesc)));
    return $result;
}

function updateKategori($request)
{
    $result = new stdClass;
    $result->responseCode = "";
    $result->responseDesc = "";

    $CI = &get_instance();
    $CI->load->model('user_model');
    $CI->load->model('activity_model');
    $datapost = json_decode($request);
    try {
        if (!isset($datapost->id)) {
            throw new Exception("Parameter id tidak ditemukan");
        }
        if ($datapost->id == "") {
            throw new Exception("id tidak boleh kosong");
        }
        $id = $datapost->id;

        if (!isset($datapost->kategori)) {
            throw new Exception("Parameter kategori tidak ditemukan");
        }
        if ($datapost->kategori == "") {
            throw new Exception("kategori tidak boleh kosong");
        }
        $kategori = $datapost->kategori;

        $resdata = $CI->user_model->updateKategori($id, $kategori);
        if (!$resdata) {
            throw new Exception("Gagal update Kategori");
        }

        $result->responseCode = '00';
        $result->responseDesc = 'Berhasil update Kategori';
    } catch (Exception $e) {
        $result->responseCode = '99';
        $result->responseDesc = $e->getMessage() . " Ln." . $e->getLine();
    }

    $CI->activity_model->insert_activity((isset($datapost->requestMethod) ? $CI->security->xss_clean(trim($datapost->requestMethod)) : '') . ' RESPONSE ', json_encode(array("responseCode" => $result->responseCode, "responseDesc" => $result->responseDesc)));
    return $result;
}

function updateMerk($request)
{
    $result = new stdClass;
    $result->responseCode = "";
    $result->responseDesc = "";

    $CI = &get_instance();
    $CI->load->model('user_model');
    $CI->load->model('activity_model');
    $datapost = json_decode($request);
    try {
        if (!isset($datapost->id)) {
            throw new Exception("Parameter id tidak ditemukan");
        }
        if ($datapost->id == "") {
            throw new Exception("id tidak boleh kosong");
        }
        $id = $datapost->id;

        if (!isset($datapost->merk)) {
            throw new Exception("Parameter merk tidak ditemukan");
        }
        if ($datapost->merk == "") {
            throw new Exception("merk tidak boleh kosong");
        }
        $merk = $datapost->merk;

        $resdata = $CI->user_model->updateMerk($id, $merk);
        if (!$resdata) {
            throw new Exception("Gagal update merk");
        }

        $result->responseCode = '00';
        $result->responseDesc = 'Berhasil update merk';
    } catch (Exception $e) {
        $result->responseCode = '99';
        $result->responseDesc = $e->getMessage() . " Ln." . $e->getLine();
    }

    $CI->activity_model->insert_activity((isset($datapost->requestMethod) ? $CI->security->xss_clean(trim($datapost->requestMethod)) : '') . ' RESPONSE ', json_encode(array("responseCode" => $result->responseCode, "responseDesc" => $result->responseDesc)));
    return $result;
}

function updateStok($request)
{
    $result = new stdClass;
    $result->responseCode = "";
    $result->responseDesc = "";

    $CI = &get_instance();
    $CI->load->model('user_model');
    $CI->load->model('activity_model');
    $datapost = json_decode($request);
    try {
        if (!isset($datapost->id)) {
            throw new Exception("Parameter id tidak ditemukan");
        }
        if ($datapost->id == "") {
            throw new Exception("id tidak boleh kosong");
        }
        $id = $datapost->id;

        if (!isset($datapost->nama)) {
            throw new Exception("Parameter nama tidak ditemukan");
        }
        if ($datapost->nama == "") {
            throw new Exception("nama tidak boleh kosong");
        }
        $nama = $datapost->nama;

        if (!isset($datapost->jumlah)) {
            throw new Exception("Parameter jumlah tidak ditemukan");
        }
        if ($datapost->jumlah == "") {
            throw new Exception("jumlah tidak boleh kosong");
        }
        $jumlah = $datapost->jumlah;

        if (!isset($datapost->merk)) {
            throw new Exception("Parameter merk tidak ditemukan");
        }
        if ($datapost->merk == "") {
            throw new Exception("merk tidak boleh kosong");
        }
        $merk = $datapost->merk;

        if (!isset($datapost->jenis)) {
            throw new Exception("Parameter jenis tidak ditemukan");
        }
        if ($datapost->jenis == "") {
            throw new Exception("jenis tidak boleh kosong");
        }
        $jenis = $datapost->jenis;

        $resdata = $CI->user_model->updateStok($id, $nama, $jumlah, $merk, $jenis);
        if (!$resdata) {
            throw new Exception("Gagal update stok");
        }

        $result->responseCode = '00';
        $result->responseDesc = 'Berhasil update stok';
    } catch (Exception $e) {
        $result->responseCode = '99';
        $result->responseDesc = $e->getMessage() . " Ln." . $e->getLine();
    }

    $CI->activity_model->insert_activity((isset($datapost->requestMethod) ? $CI->security->xss_clean(trim($datapost->requestMethod)) : '') . ' RESPONSE ', json_encode(array("responseCode" => $result->responseCode, "responseDesc" => $result->responseDesc)));
    return $result;
}

function deleteBerita($request)
{
    $result = new stdClass;
    $result->responseCode = "";
    $result->responseDesc = "";

    $CI = &get_instance();
    $CI->load->model('user_model');
    $CI->load->model('activity_model');
    $datapost = json_decode($request);
    try {
        if (!isset($datapost->id)) {
            throw new Exception("Parameter id tidak ditemukan");
        }
        if ($datapost->id == "") {
            throw new Exception("id tidak boleh kosong");
        }
        $id = $datapost->id;

        $resdata = $CI->user_model->deleteBerita($id);
        if (!$resdata) {
            throw new Exception("Gagal delete berita");
        }

        $result->responseCode = '00';
        $result->responseDesc = 'Berhasil delete Berita';
    } catch (Exception $e) {
        $result->responseCode = '99';
        $result->responseDesc = $e->getMessage() . " Ln." . $e->getLine();
    }

    $CI->activity_model->insert_activity((isset($datapost->requestMethod) ? $CI->security->xss_clean(trim($datapost->requestMethod)) : '') . ' RESPONSE ', json_encode(array("responseCode" => $result->responseCode, "responseDesc" => $result->responseDesc)));
    return $result;
}

function deleteBarang($request)
{
    $result = new stdClass;
    $result->responseCode = "";
    $result->responseDesc = "";

    $CI = &get_instance();
    $CI->load->model('user_model');
    $CI->load->model('activity_model');
    $datapost = json_decode($request);
    try {
        if (!isset($datapost->id)) {
            throw new Exception("Parameter id tidak ditemukan");
        }
        if ($datapost->id == "") {
            throw new Exception("id tidak boleh kosong");
        }
        $id = $datapost->id;

        $resdata = $CI->user_model->deleteBarang($id);
        if (!$resdata) {
            throw new Exception("Gagal delete Barang");
        }

        $result->responseCode = '00';
        $result->responseDesc = 'Berhasil delete Barang';
    } catch (Exception $e) {
        $result->responseCode = '99';
        $result->responseDesc = $e->getMessage() . " Ln." . $e->getLine();
    }

    $CI->activity_model->insert_activity((isset($datapost->requestMethod) ? $CI->security->xss_clean(trim($datapost->requestMethod)) : '') . ' RESPONSE ', json_encode(array("responseCode" => $result->responseCode, "responseDesc" => $result->responseDesc)));
    return $result;
}

function deleteKategori($request)
{
    $result = new stdClass;
    $result->responseCode = "";
    $result->responseDesc = "";

    $CI = &get_instance();
    $CI->load->model('user_model');
    $CI->load->model('activity_model');
    $datapost = json_decode($request);
    try {
        if (!isset($datapost->id)) {
            throw new Exception("Parameter id tidak ditemukan");
        }
        if ($datapost->id == "") {
            throw new Exception("id tidak boleh kosong");
        }
        $id = $datapost->id;

        $resdata = $CI->user_model->deleteKategori($id);
        if (!$resdata) {
            throw new Exception("Gagal delete Kategori");
        }

        $result->responseCode = '00';
        $result->responseDesc = 'Berhasil delete Kategori';
    } catch (Exception $e) {
        $result->responseCode = '99';
        $result->responseDesc = $e->getMessage() . " Ln." . $e->getLine();
    }

    $CI->activity_model->insert_activity((isset($datapost->requestMethod) ? $CI->security->xss_clean(trim($datapost->requestMethod)) : '') . ' RESPONSE ', json_encode(array("responseCode" => $result->responseCode, "responseDesc" => $result->responseDesc)));
    return $result;
}

function deleteStok($request)
{
    $result = new stdClass;
    $result->responseCode = "";
    $result->responseDesc = "";

    $CI = &get_instance();
    $CI->load->model('user_model');
    $CI->load->model('activity_model');
    $datapost = json_decode($request);
    try {
        if (!isset($datapost->id)) {
            throw new Exception("Parameter id tidak ditemukan");
        }
        if ($datapost->id == "") {
            throw new Exception("id tidak boleh kosong");
        }
        $id = $datapost->id;

        $resdata = $CI->user_model->deleteStok($id);
        if (!$resdata) {
            throw new Exception("Gagal delete stok");
        }

        $result->responseCode = '00';
        $result->responseDesc = 'Berhasil delete stok';
    } catch (Exception $e) {
        $result->responseCode = '99';
        $result->responseDesc = $e->getMessage() . " Ln." . $e->getLine();
    }

    $CI->activity_model->insert_activity((isset($datapost->requestMethod) ? $CI->security->xss_clean(trim($datapost->requestMethod)) : '') . ' RESPONSE ', json_encode(array("responseCode" => $result->responseCode, "responseDesc" => $result->responseDesc)));
    return $result;
}

function deleteMerk($request)
{
    $result = new stdClass;
    $result->responseCode = "";
    $result->responseDesc = "";

    $CI = &get_instance();
    $CI->load->model('user_model');
    $CI->load->model('activity_model');
    $datapost = json_decode($request);
    try {
        if (!isset($datapost->id)) {
            throw new Exception("Parameter id tidak ditemukan");
        }
        if ($datapost->id == "") {
            throw new Exception("id tidak boleh kosong");
        }
        $id = $datapost->id;

        $resdata = $CI->user_model->deleteMerk($id);
        if (!$resdata) {
            throw new Exception("Gagal delete merk");
        }

        $result->responseCode = '00';
        $result->responseDesc = 'Berhasil delete merk';
    } catch (Exception $e) {
        $result->responseCode = '99';
        $result->responseDesc = $e->getMessage() . " Ln." . $e->getLine();
    }

    $CI->activity_model->insert_activity((isset($datapost->requestMethod) ? $CI->security->xss_clean(trim($datapost->requestMethod)) : '') . ' RESPONSE ', json_encode(array("responseCode" => $result->responseCode, "responseDesc" => $result->responseDesc)));
    return $result;
}

function addBarang($request)
{
    $result = new stdClass;
    $result->responseCode = "";
    $result->responseDesc = "";

    $CI = &get_instance();
    $CI->load->model('user_model');
    $CI->load->model('activity_model');
    $datapost = json_decode($request);
    try {
        if (!isset($datapost->nama)) {
            throw new Exception("Parameter nama tidak valid");
        }
        if ($datapost->nama == "") {
            throw new Exception("nama tidak boleh kosong");
        }
        $nama = $datapost->nama;
        if (!isset($datapost->merk)) {
            throw new Exception("Parameter merk tidak valid");
        }
        if ($datapost->merk == "") {
            throw new Exception("Merk tidak boleh kosong");
        }
        $merk = $datapost->merk;
        if (!isset($datapost->harga)) {
            throw new Exception("Parameter harga tidak valid");
        }
        if ($datapost->harga == "") {
            throw new Exception("harga tidak boleh kosong");
        }
        $harga = $datapost->harga;
        if (!isset($datapost->kategori)) {
            throw new Exception("Parameter kategori tidak valid");
        }
        if ($datapost->kategori == "") {
            throw new Exception("kategori tidak boleh kosong");
        }
        $kategori = $datapost->kategori;
        if (!isset($datapost->jumlah)) {
            throw new Exception("Parameter jumlah tidak valid");
        }
        if ($datapost->jumlah == "") {
            throw new Exception("jumlah tidak boleh kosong");
        }
        $jumlah = $datapost->jumlah;
        $resdata = $CI->user_model->addBarang($nama, $merk, $harga, $kategori, $jumlah);
        if (!$resdata) {
            throw new Exception("Gagal add barang");
        }

        $result->responseCode = '00';
        $result->responseDesc = 'Berhasil Add barang';
    } catch (Exception $e) {
        $result->responseCode = '99';
        $result->responseDesc = $e->getMessage() . " Ln." . $e->getLine();
    }

    $CI->activity_model->insert_activity((isset($datapost->requestMethod) ? $CI->security->xss_clean(trim($datapost->requestMethod)) : '') . ' RESPONSE ', json_encode(array("responseCode" => $result->responseCode, "responseDesc" => $result->responseDesc)));
    return $result;
}

function addKategori($request)
{
    $result = new stdClass;
    $result->responseCode = "";
    $result->responseDesc = "";

    $CI = &get_instance();
    $CI->load->model('user_model');
    $CI->load->model('activity_model');
    $datapost = json_decode($request);
    try {
        if (!isset($datapost->kategori)) {
            throw new Exception("Parameter kategori tidak valid");
        }
        if ($datapost->kategori == "") {
            throw new Exception("kategori tidak boleh kosong");
        }
        $kategori = $datapost->kategori;

        $resdata = $CI->user_model->addKategori($kategori);
        if (!$resdata) {
            throw new Exception("Gagal add kategori");
        }

        $result->responseCode = '00';
        $result->responseDesc = 'Berhasil add kategori';
    } catch (Exception $e) {
        $result->responseCode = '99';
        $result->responseDesc = $e->getMessage() . " Ln." . $e->getLine();
    }

    $CI->activity_model->insert_activity((isset($datapost->requestMethod) ? $CI->security->xss_clean(trim($datapost->requestMethod)) : '') . ' RESPONSE ', json_encode(array("responseCode" => $result->responseCode, "responseDesc" => $result->responseDesc)));
    return $result;
}

function addMerk($request)
{
    $result = new stdClass;
    $result->responseCode = "";
    $result->responseDesc = "";

    $CI = &get_instance();
    $CI->load->model('user_model');
    $CI->load->model('activity_model');
    $datapost = json_decode($request);
    try {
        if (!isset($datapost->merk)) {
            throw new Exception("Parameter merk tidak valid");
        }
        if ($datapost->merk == "") {
            throw new Exception("merk tidak boleh kosong");
        }
        $merk = $datapost->merk;

        $resdata = $CI->user_model->addMerk($merk);
        if (!$resdata) {
            throw new Exception("Gagal add merk");
        }

        $result->responseCode = '00';
        $result->responseDesc = 'Berhasil add merk';
    } catch (Exception $e) {
        $result->responseCode = '99';
        $result->responseDesc = $e->getMessage() . " Ln." . $e->getLine();
    }

    $CI->activity_model->insert_activity((isset($datapost->requestMethod) ? $CI->security->xss_clean(trim($datapost->requestMethod)) : '') . ' RESPONSE ', json_encode(array("responseCode" => $result->responseCode, "responseDesc" => $result->responseDesc)));
    return $result;
}

function addStok($request)
{
    $result = new stdClass;
    $result->responseCode = "";
    $result->responseDesc = "";

    $CI = &get_instance();
    $CI->load->model('user_model');
    $CI->load->model('activity_model');
    $datapost = json_decode($request);
    try {
        if (!isset($datapost->nama)) {
            throw new Exception("Parameter stok tidak valid");
        }
        if ($datapost->nama == "") {
            throw new Exception("nama tidak boleh kosong");
        }
        $nama = $datapost->nama;

        if (!isset($datapost->jumlah)) {
            throw new Exception("Parameter jumlah tidak valid");
        }
        if ($datapost->jumlah == "") {
            throw new Exception("jumlah tidak boleh kosong");
        }
        $jumlah = $datapost->jumlah;

        if (!isset($datapost->merk)) {
            throw new Exception("Parameter merk tidak valid");
        }
        if ($datapost->merk == "") {
            throw new Exception("merk tidak boleh kosong");
        }
        $merk = $datapost->merk;

        if (!isset($datapost->jenis)) {
            throw new Exception("Parameter jenis tidak valid");
        }
        if ($datapost->jenis == "") {
            throw new Exception("jenis tidak boleh kosong");
        }
        $jenis = $datapost->jenis;

        $resdata = $CI->user_model->addStok($nama, $jumlah, $merk, $jenis);
        if (!$resdata) {
            throw new Exception("Gagal add stok");
        }

        $result->responseCode = '00';
        $result->responseDesc = 'Berhasil add stok';
    } catch (Exception $e) {
        $result->responseCode = '99';
        $result->responseDesc = $e->getMessage() . " Ln." . $e->getLine();
    }

    $CI->activity_model->insert_activity((isset($datapost->requestMethod) ? $CI->security->xss_clean(trim($datapost->requestMethod)) : '') . ' RESPONSE ', json_encode(array("responseCode" => $result->responseCode, "responseDesc" => $result->responseDesc)));
    return $result;
}

function getAllUser($request)
{
    $result = new stdClass;
    $result->responseCode = "";
    $result->responseDesc = "";

    $user = '';
    $CI = &get_instance();
    $CI->load->model('activity_model');
    $CI->load->model('user_model');
    $datapost = json_decode($request);
    try {
        $user = $datapost->user;
        if ($CI->libs_bearer->cekToken() == false) {
            throw new Exception("Access Forbidden");
        }

        if (!isset($datapost->user)) {
            throw new Exception("Parameter user tidak valid");
        }

        $resdata = $CI->user_model->getAllUser($user);
        if (!$resdata || $resdata->num_rows() == 0) {
            throw new Exception("Data tidak ditemukan.");
        }
        $result->responseCode = '00';
        $result->responseDesc = 'Inquiry Sukses.';
        $result->responseData = $resdata->result();
    } catch (Exception $e) {
        $result->responseCode = '99';
        $result->responseDesc = $e->getMessage() . " Ln." . $e->getLine();
    }

    $CI->activity_model->insert_activity((isset($datapost->requestMethod) ? $CI->security->xss_clean(trim($datapost->requestMethod)) : '') . ' RESPONSE ', json_encode(array("responseCode" => $result->responseCode, "responseDesc" => $result->responseDesc)));
    return $result;
}

function getBarang($request)
{
    $result = new stdClass;
    $result->responseCode = "";
    $result->responseDesc = "";

    $tbl_barang = '';
    $CI = &get_instance();
    $CI->load->model('activity_model');
    $CI->load->model('user_model');
    $datapost = json_decode($request);
    try {
        $tbl_barang = $datapost->tbl_barang;
        if ($CI->libs_bearer->cekToken() == false) {
            throw new Exception("Access Forbidden");
        }

        if (!isset($datapost->tbl_barang)) {
            throw new Exception("Parameter tbl_barang tidak valid");
        }

        $resdata = $CI->user_model->getBarang($tbl_barang);
        if (!$resdata || $resdata->num_rows() == 0) {
            throw new Exception("Data tidak ditemukan.");
        }
        $result->responseCode = '00';
        $result->responseDesc = 'Inquiry Sukses.';
        $result->responseData = $resdata->result();
    } catch (Exception $e) {
        $result->responseCode = '99';
        $result->responseDesc = $e->getMessage() . " Ln." . $e->getLine();
    }

    $CI->activity_model->insert_activity((isset($datapost->requestMethod) ? $CI->security->xss_clean(trim($datapost->requestMethod)) : '') . ' RESPONSE ', json_encode(array("responseCode" => $result->responseCode, "responseDesc" => $result->responseDesc)));
    return $result;
}

function getBerita($request)
{
    $result = new stdClass;
    $result->responseCode = "";
    $result->responseDesc = "";

    $tbl_berita = '';
    $CI = &get_instance();
    $CI->load->model('activity_model');
    $CI->load->model('user_model');
    $datapost = json_decode($request);
    try {
        if ($CI->libs_bearer->cekToken() == false) {
            throw new Exception("Access Forbidden");
        }

        if (!isset($datapost->nama)) {
            throw new Exception("Parameter nama tidak valid");
        }

        $resdata = $CI->user_model->getBerita();
        if (!$resdata || $resdata->num_rows() == 0) {
            throw new Exception("Data tidak ditemukan.");
        }
        $result->responseCode = '00';
        $result->responseDesc = 'Get Data Berita Sukses.';
        $result->responseData = $resdata->result();
    } catch (Exception $e) {
        $result->responseCode = '99';
        $result->responseDesc = $e->getMessage() . " Ln." . $e->getLine();
    }

    $CI->activity_model->insert_activity((isset($datapost->requestMethod) ? $CI->security->xss_clean(trim($datapost->requestMethod)) : '') . ' RESPONSE ', json_encode(array("responseCode" => $result->responseCode, "responseDesc" => $result->responseDesc)));
    return $result;
}

function getKategori($request)
{
    $result = new stdClass;
    $result->responseCode = "";
    $result->responseDesc = "";

    $tbl_kategori = '';
    $CI = &get_instance();
    $CI->load->model('activity_model');
    $CI->load->model('user_model');
    $datapost = json_decode($request);
    try {
        $tbl_kategori = $datapost->tbl_kategori;
        if ($CI->libs_bearer->cekToken() == false) {
            throw new Exception("Access Forbidden");
        }

        if (!isset($datapost->tbl_kategori)) {
            throw new Exception("Parameter tbl_kategori tidak valid");
        }

        $resdata = $CI->user_model->getKategori($tbl_kategori);
        if (!$resdata || $resdata->num_rows() == 0) {
            throw new Exception("Data tidak ditemukan.");
        }
        $result->responseCode = '00';
        $result->responseDesc = 'Inquiry Sukses.';
        $result->responseData = $resdata->result();
    } catch (Exception $e) {
        $result->responseCode = '99';
        $result->responseDesc = $e->getMessage() . " Ln." . $e->getLine();
    }

    $CI->activity_model->insert_activity((isset($datapost->requestMethod) ? $CI->security->xss_clean(trim($datapost->requestMethod)) : '') . ' RESPONSE ', json_encode(array("responseCode" => $result->responseCode, "responseDesc" => $result->responseDesc)));
    return $result;
}

function getMerk($request)
{
    $result = new stdClass;
    $result->responseCode = "";
    $result->responseDesc = "";

    $tbl_merk = '';
    $CI = &get_instance();
    $CI->load->model('activity_model');
    $CI->load->model('user_model');
    $datapost = json_decode($request);
    try {
        $tbl_merk = $datapost->tbl_merk;
        if ($CI->libs_bearer->cekToken() == false) {
            throw new Exception("Access Forbidden");
        }

        if (!isset($datapost->tbl_merk)) {
            throw new Exception("Parameter tbl_merk tidak valid");
        }

        $resdata = $CI->user_model->getMerk($tbl_merk);
        if (!$resdata || $resdata->num_rows() == 0) {
            throw new Exception("Data tidak ditemukan.");
        }
        $result->responseCode = '00';
        $result->responseDesc = 'Inquiry Sukses.';
        $result->responseData = $resdata->result();
    } catch (Exception $e) {
        $result->responseCode = '99';
        $result->responseDesc = $e->getMessage() . " Ln." . $e->getLine();
    }

    $CI->activity_model->insert_activity((isset($datapost->requestMethod) ? $CI->security->xss_clean(trim($datapost->requestMethod)) : '') . ' RESPONSE ', json_encode(array("responseCode" => $result->responseCode, "responseDesc" => $result->responseDesc)));
    return $result;
}

function getStok($request)
{
    $result = new stdClass;
    $result->responseCode = "";
    $result->responseDesc = "";

    $tbl_stok = '';
    $CI = &get_instance();
    $CI->load->model('activity_model');
    $CI->load->model('user_model');
    $datapost = json_decode($request);
    try {
        $tbl_stok = $datapost->tbl_stok;
        if ($CI->libs_bearer->cekToken() == false) {
            throw new Exception("Access Forbidden");
        }

        if (!isset($datapost->tbl_stok)) {
            throw new Exception("Parameter tbl_stok tidak valid");
        }

        $resdata = $CI->user_model->getStok($tbl_stok);
        if (!$resdata || $resdata->num_rows() == 0) {
            throw new Exception("Data tidak ditemukan.");
        }
        $result->responseCode = '00';
        $result->responseDesc = 'Inquiry Sukses.';
        $result->responseData = $resdata->result();
    } catch (Exception $e) {
        $result->responseCode = '99';
        $result->responseDesc = $e->getMessage() . " Ln." . $e->getLine();
    }

    $CI->activity_model->insert_activity((isset($datapost->requestMethod) ? $CI->security->xss_clean(trim($datapost->requestMethod)) : '') . ' RESPONSE ', json_encode(array("responseCode" => $result->responseCode, "responseDesc" => $result->responseDesc)));
    return $result;
}

function getUser($request)
{
    $result = new stdClass;
    $result->responseCode = "";
    $result->responseDesc = "";

    $user = '';
    $CI = &get_instance();
    $CI->load->model('activity_model');
    $CI->load->model('user_model');
    $datapost = json_decode($request);
    try {
        $user = $datapost->user;
        if ($CI->libs_bearer->cekToken() == false) {
            throw new Exception("Access Forbidden");
        }

        if (!isset($datapost->user)) {
            throw new Exception("Parameter user tidak valid");
        }

        $resdata = $CI->user_model->getUser($user);
        if (!$resdata || $resdata->num_rows() == 0) {
            throw new Exception("Data tidak ditemukan.");
        }
        $result->responseCode = '00';
        $result->responseDesc = 'Inquiry Sukses.';
        $result->responseData = $resdata->result();
    } catch (Exception $e) {
        $result->responseCode = '99';
        $result->responseDesc = $e->getMessage() . " Ln." . $e->getLine();
    }

    $CI->activity_model->insert_activity((isset($datapost->requestMethod) ? $CI->security->xss_clean(trim($datapost->requestMethod)) : '') . ' RESPONSE ', json_encode(array("responseCode" => $result->responseCode, "responseDesc" => $result->responseDesc)));
    return $result;
}

function postUser($request)
{
    $result = new stdClass;
    $result->responseCode = "";
    $result->responseDesc = "";

    $user = '';
    $CI = &get_instance();
    $CI->load->model('activity_model');
    $CI->load->model('user_model');
    $datapost = json_decode($request);
    try {
        $user = $datapost->user;
        if ($CI->libs_bearer->cekToken() == false) {
            throw new Exception("Access Forbidden");
        }

        if (!isset($datapost->user)) {
            throw new Exception("Parameter user tidak valid");
        }
        if (!isset($datapost->id_user)) {
            throw new Exception("Parameter id_user tidak valid");
        }
        $id_user = $datapost->id_user;

        $resdata = $CI->user_model->getUser($id_user);
        if (!$resdata || $resdata->num_rows() == 0) {
            throw new Exception("Data tidak ditemukan.");
        }
        $result->responseCode = '00';
        $result->responseDesc = 'Inquiry Sukses.';
        $result->responseData = $resdata->result();
    } catch (Exception $e) {
        $result->responseCode = '99';
        $result->responseDesc = $e->getMessage() . " Ln." . $e->getLine();
    }

    $CI->activity_model->insert_activity((isset($datapost->requestMethod) ? $CI->security->xss_clean(trim($datapost->requestMethod)) : '') . ' RESPONSE ', json_encode(array("responseCode" => $result->responseCode, "responseDesc" => $result->responseDesc)));
    return $result;
}

function login($request)
{
    $result = new stdClass;
    $result->responseCode = "";
    $result->responseDesc = "";

    $user = '';
    $CI = &get_instance();
    $CI->load->model('activity_model');
    $CI->load->model('user_model');
    $datapost = json_decode($request);
    try {
        $requestData = $datapost->requestData;
        if ($CI->libs_bearer->cekToken() == false) {
            throw new Exception("Access Forbidden");
        }

        $username = $requestData->username;
        if (!isset($requestData->username)) {
            throw new Exception("Parameter username tidak valid");
        }

        $password = $requestData->password;
        if (!isset($requestData->password)) {
            throw new Exception("Parameter password tidak valid");
        }

        $resdata = $CI->user_model->get_user($username, $password);
        if (!$resdata || $resdata->num_rows() == 0) {
            throw new Exception("Akun tidak ditemukan.");
        }
        $result->responseCode = '00';
        $result->responseDesc = 'Login Sukses.';
        $result->responseData = $resdata->result();
    } catch (Exception $e) {
        $result->responseCode = '99';
        $result->responseDesc = $e->getMessage() . " Ln." . $e->getLine();
    }

    $CI->activity_model->insert_activity((isset($datapost->requestMethod) ? $CI->security->xss_clean(trim($datapost->requestMethod)) : '') . ' RESPONSE ', json_encode(array("responseCode" => $result->responseCode, "responseDesc" => $result->responseDesc)));
    return $result;
}

function register($request)
{
    $result = new stdClass;
    $result->responseCode = "";
    $result->responseDesc = "";

    $user = '';
    $CI = &get_instance();
    $CI->load->model('activity_model');
    $CI->load->model('user_model');
    $datapost = json_decode($request);
    try {
        $requestData = $datapost->requestData;
        $username = $requestData->username;
        if ($CI->libs_bearer->cekToken() == false) {
            throw new Exception("Access Forbidden");
        }
        if (!isset($requestData->username)) {
            throw new Exception("Parameter username tidak valid");
        }
        $nama = $requestData->nama;
        if (!isset($requestData->nama)) {
            throw new Exception("Parameter nama tidak valid");
        }
        $password = $requestData->password;
        if (!isset($requestData->password)) {
            throw new Exception("Parameter password tidak valid");
        }
        $email = $requestData->email;
        if (!isset($requestData->email)) {
            throw new Exception("Parameter email tidak valid");
        }
        $foto = $requestData->foto;
        if (!isset($requestData->foto)) {
            throw new Exception("Parameter email tidak valid");
        }
        $phone = $requestData->phone;
        if (!isset($requestData->phone)) {
            throw new Exception("Parameter phone tidak valid");
        }
        $cekuser = $CI->user_model->cek_user($username);
        $ceknohp = $CI->user_model->cek_nohp($phone);
        if ($cekuser->num_rows() != 0) {
            throw new Exception("Username sudah digunakan");
        }
        if ($ceknohp->num_rows() != 0) {
            throw new Exception("Nomor HP sudah digunakan");
        }

        $resdata = $CI->user_model->create_user($username, $nama, $password, $email, $phone, $foto);
        if (!$resdata) {
            throw new Exception("Data tidak berhasil disimpan.");
        }
        $result->responseCode = '00';
        $result->responseDesc = 'Registrasi Sukses.';
    } catch (Exception $e) {
        $result->responseCode = '99';
        $result->responseDesc = $e->getMessage() . " Ln." . $e->getLine();
    }

    $CI->activity_model->insert_activity((isset($datapost->requestMethod) ? $CI->security->xss_clean(trim($datapost->requestMethod)) : '') . ' RESPONSE ', json_encode(array("responseCode" => $result->responseCode, "responseDesc" => $result->responseDesc)));
    return $result;
}