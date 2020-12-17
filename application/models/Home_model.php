<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model {

  function getJurnal()
    {
        
        $this->db->select('jurnal.*,master_coa.*');
        $this->db->from('jurnal');
        $this->db->join('master_coa','master_coa.kdcoa= jurnal.kdcoa','inner');
        $query = $this->db->get();
        return $query;
    }

  public function getSelect()
    {
        $mulai=$this->input->post('mulai');
        $selesai=$this->input->post('selesai');
        $kdcoa=$this->input->post('kdcoa');
        
        $query = $this->db->query("
        SELECT
          temp.tgl,
          temp.kode,
          temp.debit,
          temp.credit,
          temp.kdcoa,
          temp.coa,
          temp.nama,
          temp.jurnal_akhir
        FROM
        (
          SELECT
          jurnal.tgl,
          jurnal.kode,
          jurnal.debit,
          jurnal.credit,
          jurnal.kdcoa,
          master_coa.coa,
          master_coa.nama,
          (
            CASE 
            WHEN @init_kode IS NULL AND @init_jurnal IS NULL THEN (@init_kode := jurnal.kdcoa) AND (@init_jurnal := 0)
            WHEN @init_kode IS NOT NULL AND @init_kode <> jurnal.kdcoa THEN (@init_kode := jurnal.kdcoa) AND (@init_jurnal := 0)
            WHEN @init_kode IS NOT NULL AND @init_kode = jurnal.kdcoa THEN 1
            END
          ) AS marker,
          @init_jurnal := (@init_jurnal + jurnal.debit) - jurnal.credit AS jurnal_akhir
          FROM jurnal
          INNER JOIN master_coa on master_coa.kdcoa=jurnal.kdcoa,
          (SELECT @init_jurnal:=NULL) init_jurnal, (SELECT @init_kode:=NULL) init_kode
          where DATE_FORMAT(jurnal.tgl, '%Y-%m-%d') BETWEEN '$mulai' AND '$selesai'AND jurnal.kdcoa='$kdcoa'
        ) AS temp;

            ");
        return $query;
    }

    function getData()
    {
        
        $query =$this->getSelect();
        return $query->result();
    }

    public function count_all()
    {
       $query = $this->getSelect();
        return $this->db->count_all_results();
    }

    function count_filtered()
    {
       $query = $this->getSelect();
      return $query->num_rows();
    }


}
