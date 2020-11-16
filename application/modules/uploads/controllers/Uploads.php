<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Uploads extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if($_SESSION['nip'])
		{
			redirect("home"); 
		}else{
			redirect("user");
		}
	}

	public function v_span()
	{
		if($_SESSION['nip'])
		{
			// redirect("home");
			$this->load->view("include/head");
			$this->load->view("include/top-header");
			$this->load->view('v_import_span');
			$this->load->view("include/sidebar");
			$this->load->view("include/panel");
			$this->load->view("include/footer"); 
		}else{
			redirect("user");
		}
	}

	public function v_pok()
	{
		if($_SESSION['nip'])
		{
			$x['title'] = "pok";
			$this->load->view("include/head");
			$this->load->view("include/top-header");
			$this->load->view('v_import', $x);
			$this->load->view("include/sidebar");
			// $this->load->view("include/panel");
			$this->load->view("include/footer");  
		}else{
			redirect("user");
		}
	}

	public function v_sas()
	{
		if($_SESSION['nip'])
		{
			$this->load->view("include/head");
			$this->load->view("include/top-header");
			$this->load->view('v_import_sas');
			$this->load->view("include/sidebar");
			$this->load->view("include/panel");
			$this->load->view("include/footer"); 
		}else{
			redirect("user");
		}
	}

	public function v_sarpras()
	{
		if($_SESSION['nip'])
		{
			$x['title'] = "sarpras";
			$this->load->view("include/head");
			$this->load->view("include/top-header");
			$this->load->view('v_import', $x);
			$this->load->view("include/sidebar");
			// $this->load->view("include/panel");
			$this->load->view("include/footer"); 
		}else{
			redirect("user");
		}
	}

	public function v_praja()
	{
		if($_SESSION['nip'])
		{
			$x['title'] = "praja";
			$this->load->view("include/head");
			$this->load->view("include/top-header");
			$this->load->view('v_import_praja', $x);
			$this->load->view("include/sidebar");
			// $this->load->view("include/panel");
			$this->load->view("include/footer"); 
		}else{
			redirect("user");
		}
	}

	public function span(){
		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(isset($_FILES['span']['name']) && in_array($_FILES['span']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['span']['name']);
			$extension = end($arr_file);

			if($extension != 'xlsx') {
				$this->session->set_flashdata('span', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

				redirect("uploads/v_span"); 
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$spreadsheet = $reader->load($_FILES['span']['tmp_name']);

			$list_sheet = $spreadsheet->getSheetNames();

			$sheetData = $spreadsheet->getSheetByName($list_sheet[0])->toArray();

			$data = array();
			$biro = array();

			$date = new DateTime();
			$datee = $date->format('Y-m-d');

			for($i = 10;$i < 23;$i++)
			{
				// var_dump($sheetData[$i]['2'] != 1286);
				if($sheetData[$i]['2'] != NULL && $sheetData[$i]['2'] != 1286 && $sheetData[$i]['2'] != 1292 && $sheetData[$i]['2'] != 1293 && $sheetData[$i]['2'] != 1294 && $sheetData[$i]['2'] != 1295){
					array_push($data, array(
						'kode_satker'      => $sheetData[$i]['2'],
						'nama_satker'      => $sheetData[$i]['3'],
						'pagu_bp'      => preg_replace("/[^0-9]/", "", $sheetData[$i]['4']),
						'realisasi_bp'      => preg_replace("/[^0-9]/", "", $sheetData[$i]['5']),
						'persentase_bp'      => $sheetData[$i]['7'],
						'pagu_bb'      => preg_replace("/[^0-9]/", "", $sheetData[$i]['8']),
						'realisasi_bb'   => preg_replace("/[^0-9]/", "", $sheetData[$i]['9']),
						'persentase_bb'   => $sheetData[$i]['11'],
						'pagu_bm'   => preg_replace("/[^0-9]/", "", $sheetData[$i]['12']),
						'realisasi_bm'   => preg_replace("/[^0-9]/", "", $sheetData[$i]['13']),
						'persentase_bm'   => $sheetData[$i]['15'],
						'pagu_t'   => preg_replace("/[^0-9]/", "", $sheetData[$i]['16']),
						'realisasi_t'   => preg_replace("/[^0-9]/", "", $sheetData[$i]['17']),
						'persentase_t'   => $sheetData[$i]['19'],
						'sisa'   => preg_replace("/[^0-9]/", "", $sheetData[$i]['20']),
						'created_date' => $datee,
					));
				}
			}

			for($i = 11;$i < 15;$i++)
			{
				array_push($biro, array(
					'kode_satker_biro'      => $sheetData[$i]['2'],
					'nama_satker_biro'      => $sheetData[$i]['3'],
					'pagu_bp'      => preg_replace("/[^0-9]/", "", $sheetData[$i]['4']),
					'realisasi_bp'      => preg_replace("/[^0-9]/", "", $sheetData[$i]['5']),
					'persentase_bp'      => $sheetData[$i]['7'],
					'pagu_bb'      => preg_replace("/[^0-9]/", "", $sheetData[$i]['8']),
					'realisasi_bb'   => preg_replace("/[^0-9]/", "", $sheetData[$i]['9']),
					'persentase_bb'   => $sheetData[$i]['11'],
					'pagu_bm'   => preg_replace("/[^0-9]/", "", $sheetData[$i]['12']),
					'realisasi_bm'   => preg_replace("/[^0-9]/", "", $sheetData[$i]['13']),
					'persentase_bm'   => $sheetData[$i]['15'],
					'pagu_t'   => preg_replace("/[^0-9]/", "", $sheetData[$i]['16']),
					'realisasi_t'   => preg_replace("/[^0-9]/", "", $sheetData[$i]['17']),
					'persentase_t'   => $sheetData[$i]['19'],
					'sisa'   => preg_replace("/[^0-9]/", "", $sheetData[$i]['20']),
					'created_date' => $datee,
				));
			}
			// exit;
			// $this->db->truncate('tbl_span_biro');
			$this->db->insert_batch('tbl_span_biro', $biro);
			// $this->db->truncate('tbl_span');
			$this->db->insert_batch('tbl_span', $data);

			//upload success
			$this->session->set_flashdata('span', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');

			redirect("uploads/v_span"); 
		}
	}

	public function pok() {
		// error_reporting(E_ERROR | E_PARSE);
		// error_reporting(E_ALL);
		// ini_set('display_errors', TRUE);
		// ini_set('display_startup_errors', TRUE);
		// satker kampus
		// 448302 IPDN KAMPUS JATINANGOR
		// 352593 IPDN KAMPUS JAKARTA
		// 677010 IPDN KAMPUS SULAWESI UTARA
		// 677024 IPDN KAMPUS SULAWESI SELATAN
		// 677045 IPDN KAMPUS SUMATERA BARAT
		// 683070 IPDN KAMPUS KALIMANTAN BARAT
		// 683084 IPDN KAMPUS NUSA TENGGARA BARAT
		// 683091 IPDN KAMPUS PAPUA

		// Load plugin PHPExcel nya
		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(strtolower($_SERVER['REQUEST_METHOD']) == 'post' && $_FILES['pok']['tmp_name'][0] != "") {
			// ada isinya
			$count = count($_FILES['pok']['name']);

			// echo $count."<br>";
			// var_dump($_FILES);
			// print("<pre>".print_r($_FILES,true)."</pre>");
			$data_out = array();
			$unitList = array();

			foreach($_FILES[ 'pok' ][ 'tmp_name' ] as $index => $tmpName) {
				// echo $_FILES['pok']['name'][$index]."<br>";
				// echo $index."<br>";

				if(isset($_FILES['pok']['name'][$index]) && in_array($_FILES['pok']['type'][$index], $file_mimes)) {

					$arr_file = explode('.', $_FILES['pok']['name'][$index]);
					$extension = end($arr_file);

					// echo $_FILES['pok']['name'][$index];
					// echo "<br><br>=============================<br><br>";

					if($extension != 'xlsx') {
						$this->session->set_flashdata('pok', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

						redirect("uploads/v_pok"); 
					} else {
						$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
					}

					$loadexcel = $reader->load($_FILES['pok']['tmp_name'][$index]);

					$list_sheet = $loadexcel->getSheetNames();

					// print("<pre>".print_r($list_sheet,true)."</pre>");

					// $sheetData = $spreadsheet->getSheetByName($list_sheet[0])->toArray();


					$biro = "";
					$set = false;
					// $data_out = array();
					// $unitList = array();

					foreach ($list_sheet as $shit) {

						// pisahkan cara membaca sheet, antara rekap dan nama bagian / unit
						// sheet yang biasanya nama bagian
						// 1. TU BIRO..
						// 2. AKADEMIK
						// ...
						// PASCA*
						// PROFESI*
						// echo $shit."<br>";
						$es = explode(".", $shit);

						if ((is_numeric($es[0]) || ($shit == "PASCA") || ($shit == "PROFESI")) && !(strpos(strtolower($shit), 'edit') === 0)) {
							// echo "<br><br>=============================<br><br>";
							// echo $shit."<br>";

							// set unit, biro ke berapa, unit ke berapa
							switch ($shit) {
								case "PASCA":
								$unit = 115;
								break;
								case "PROFESI":
								$unit = 116;
								break;
								default:
								$unit = ($es[0]<10)?$biro."0".$es[0]:$biro.$es[0];
								break;
							}

							// echo "<br>".$unit."<br>";

							$rows = $loadexcel->getSheetByName($shit)->toArray(null, true, true ,true);
							$stop = false;
							$num = 1;
							$nullcc = 0;
							while(!$stop) {
								$row = $rows[$num++];
								if ($row['A'] == NULL) {
									$nullcc++;
									if ($nullcc == 4) {
										$stop = true;    
									}
								} else {
									$nullcc = 0;
									// echo $row['A']."<br>";
									if (strpos($row['A'], 'tgl')) {
										// echo $row['A']."<br>";
										$tgl = explode("tgl. ", $row['A']);
										$tgl_last = count($tgl)-1;
										$tgl = $this->ite($tgl[$tgl_last]);
										$newDate = date("Y-m-d", strtotime($tgl));
										// echo $newDate."<br>";
									} else if ($num > 6) {
										$regex = '/^[0-9]{4}\.[0-9]{3}$/';
										if (preg_match($regex, $row['A'])) {
											// echo $row['A']." ".str_replace("_x000D_", "",$row['B'])." ".preg_replace("/[^0-9]/", "", $row['C'])." ".preg_replace("/[^0-9]/", "", $row['D'])." ".preg_replace("/[^0-9]/", "", $row['E'])."<br>";
											// echo $row['A']." ".str_replace("_x000D_", "",$row['B'])."<br>";
											array_push($data_out, array(
												'id_u'      => $unit,
												'nama'      => str_replace("[Base Line]", "", str_replace("_x000D_", "",$row['B'])),
												'pagu'      => preg_replace("/[^0-9]/", "", $row['C']),
												'realisasi' => preg_replace("/[^0-9]/", "", $row['D']),
												'kembali'   => preg_replace("/[^0-9]/", "", $row['E']),
												'tgl'       => $newDate
											));
										}
									}
								}
							}

						// sheet rekap
						// bukan nama bagian / unit
						// REKAP IPDN
						// REKAP BIRO I
						// REKAP BIRO 2
						} else if (strpos($shit, 'REKAP BIRO') === 0 && !$set) {
							// get nomer biro untuk id biro
							$set = true;
							$temp = explode(" ", $shit);
							$biro = $temp[2];
							// $unitList = array();
							if (!is_numeric($biro)) {
								$biro = $this->rti($biro);
							}

							// khusus IPDN Jatinangor
							$id_b = ($biro<10)?"10".$biro:"1".$biro;
							switch ($biro) {
								case '1':
								$id_b = 1292;
								break;
								case '2':
								$id_b = 1294;
								break;
								case '3':
								$id_b = 1293;
								break;
								case '4':
								$id_b = 1286;
								break;
							}

							// echo $shit."<br>";
							// echo "ID BIRO : ".$id_b."<br>";

							// read data pada sheet REKAP BIRO
							$rows = $loadexcel->getSheetByName($shit)->toArray(null, true, true ,true);
							$stop = false;
							$num = 1;
							$nullcc = 0;
							while(!$stop) {
								// echo $row['A']."<br>";
								$row = $rows[$num++];

								// cek eof
								if ($row['A'] == NULL) {
									$nullcc++;
									if ($nullcc == 6) {
										$stop = true;
									}
								} else if (is_numeric($row['A']) && strlen($row['B']) > 3) {
									// harusnya konten, bukan header table
									// list nama bagian / unit
									$nullcc = 0;
									$id_u = ($row['A']<10)?$biro."0".$row['A']:"1".$row['A'];
									// echo $id_u."=".$row['B']."<br>";
									// echo "INSERT INTO unit values (".$id_u.", ".$id_b.", '".$row['B']."')";
									array_push($unitList, array(
										'id'    =>  $id_u , // 301, 411, 103, ... id unit
										'id_b'  =>  $id_b,  // 101, 102, 103, 104, ... id biro
										'nama'  =>  $row['B'] // LAB, TU BIRO
									));
									// echo "<br>";
								} else if (strpos($row['A'], 'tgl')) {
									// echo $row['A']."<br>";
									$tgl = explode("tgl. ", $row['A']);
									$tgl_last = count($tgl)-1;
									$tgl = $this->ite($tgl[$tgl_last]);
									$newDate = date("Y-m-d", strtotime($tgl));
									// echo $newDate."<br>";
								}
							}
							// echo "<br>";
							// var_dump($unitList);
							// echo "<br>";

							// setting table unit kalo belum ada isinya
							// $this->db->truncate('unit_pok');

							// untuk unit_pok yang kosong
							// $this->db->insert_batch('unit_pok', $unitList); // PENTING
						}
					}
					// echo "<br>";
					// var_dump($unitList);
					// print("<pre>".print_r($unitList,true)."</pre>");
					// var_dump($data_out);
					// print("<pre>".print_r($data_out,true)."</pre>");
					// exit();

					// if (!empty($unitList)) {
					// 	$this->db->insert_batch('unit_pok', $unitList); // PENTING    
					// }
					// $this->db->truncate('out_pok');
					// $this->db->insert_batch('out_pok', $data_out);  // PENTING
					//delete file from server
					// unlink(realpath('excel/'.$data_upload['file_name'])); 
				}

			}
			// var_dump($unitList);
			// print("<pre>".print_r($unitList,true)."</pre>");
			$this->db->truncate('unit_pok');
			$this->db->insert_batch('unit_pok', $unitList); // PENTING 
			// var_dump($data_out);
			// print("<pre>".print_r($data_out,true)."</pre>");
			$this->db->truncate('out_pok');
			$this->db->insert_batch('out_pok', $data_out);  // PENTING
			// exit;
			// //upload success
			$this->session->set_flashdata('pok', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b><br>Data berhasil diimport!</div>');
			//redirect halaman
			redirect("uploads/v_pok");
		} else {
			// echo "kosong";
			$this->session->set_flashdata('pok', '<div class="alert alert-warning"><b>PROSES IMPORT GAGAL!</b><br>Data kosong!</div>');
			redirect("uploads/v_pok");
		}
	}

	public function sarpras() {

		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(isset($_FILES['sarpras']['name']) && in_array($_FILES['sarpras']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['sarpras']['name']);
			$extension = end($arr_file);

			if($extension != 'xlsx') {
				$this->session->set_flashdata('sarpras', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

				redirect("uploads/v_pok"); 
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$loadexcel = $reader->load($_FILES['sarpras']['tmp_name']);

			$list_sheet = $loadexcel->getSheetNames();

			// $sheetData = $spreadsheet->getSheetByName($list_sheet[0])->toArray();


			$table = "";
			$kategori = "";
			$set = false;
			$data = array();
			$kode_satker = 448302;
			// echo "<pre>";

			foreach ($list_sheet as $shit) {
				$table = strtolower(str_replace(" ", "_", trim($shit)));
				$kategori = trim($shit);
				// echo "====================<br>";
				// echo "tabel: $table<br>";
				// echo "====================<br>";
				$rows = $loadexcel->getSheetByName($shit)->toArray(null, true, true ,true);
				$stop = false;
				$num = 1;
				$nullcc = 0;
				$luas = 0;
				while(!$stop) {
					$row = $rows[$num++];
					// print("<pre>".print_r($row,true)."</pre>");
					if ($row['A'] == NULL) {
						$nullcc++;
						if ($nullcc == 4) {
							$stop = true;
						}
					} else {
						$nullcc = 0;
							// echo $row['A']."<br>";
						if (strpos(strtoupper($row['A']), 'PER') === 0) {
							// echo $row['A']."<br>";
							$tgl = explode("PER ", $row['A']);
							$tgl_last = count($tgl)-1;
							$tgl = $this->ite($tgl[$tgl_last]);
							$newDate = date("Y-m-d", strtotime($tgl));
							// echo "tanggal: $newDate<br>";
						} else if ($num > 6) {
							if (is_numeric($row['A']) && strlen($row['A'] > 4)) {
								$harga_beli = $harga_baru = $asal = $kondisi = "";
								$jumlah = $this->ktt($row['F']);
								if ($row['M'] != NULL) {
									// punya luas
									$luas = $this->ktt($row['G']);
									$harga_beli = $this->ktt($row['H']);
									$harga_baru = $this->ktt($row['J']);
									$asal = $row['L'];
									$kondisi = $row['M'];
								} else {
									$harga_beli = $this->ktt($row['G']);
									$harga_baru = $this->ktt($row['I']);
									$asal = $row['K'];
									$kondisi = $row['L'];
								}
								// echo "Kode: $row[A]<br>";
								// echo "Uraian: $row[B]<br>";
								// echo "NUP: $row[C]<br>";
								// echo "Merk: $row[D]<br>";
								// echo "Tahun: $row[E]<br>";
								// echo "Luas: $luas<br>";
								// echo "Jumlah: $jumlah<br>";
								// echo "Harga Satuan Perolehan: $harga_beli<br>";
								// echo "Harga Satuan Revaluasi: $harga_baru<br>";
								// echo "Asal: $asal<br>";
								// echo "Kondisi: $kondisi<br>";

								// echo "<br>";
								array_push($data, array(
									'kode_satker'    =>  $kode_satker,
									'kode'  =>  $row['A'],
									'uraian' => $row['B'],
									'nup' => $row['C'],
									'merk' => $row['D'],
									'tahun' => $row['E'],
									'jumlah' => $jumlah,
									'harga_beli' => $harga_beli,
									'harga_baru' => $harga_baru,
									'asal' => $asal,
									'kondisi' => $kondisi,
									'luas' => $luas,
									'kategori' => $kategori
								));
							}
						}
					}
				}
				// echo "<br>";
				// echo "<br>";
				// echo "<br>";
			}
			// echo "</pre>";
			$this->db->insert_batch('sarpras', $data);
			// exit;
		}

		//upload success
		$this->session->set_flashdata('sarpras', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b><br>Data '.$_FILES['sarpras']['name'].' berhasil diimport!</div>');
			//redirect halaman
		redirect("uploads/v_sarpras"); 
	}    

	public function uploadPagu()
	{
		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(isset($_FILES['pagu']['name']) && in_array($_FILES['pagu']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['pagu']['name']);
			$extension = end($arr_file);

			if($extension != 'xlsx') {
				$this->session->set_flashdata('pagu', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

				redirect("uploads/v_sas"); 
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$loadexcel  = $reader->load($_FILES['pagu']['tmp_name']);

			$sheet             = $loadexcel->getSheetByName("pagu ipdn")->toArray(null, true, true ,true);
			$dataunit = array();
			$dataoutput = array();
			$numrow = 1;
			$bag = '';
			$id_c = 0;
			$satker_jatinangor = 448302;

			foreach($sheet as $row){
				if($numrow > 1){
					if ($row['A'] == 2){
						$cunit = 0;
						$coutput = 0;
						if (strpos($row['AI'], 'Perencanaan')) {
							$cbiro = 1;
							$id_b = ($cbiro<10)?"10".$cbiro:"1".$cbiro;
							// echo "ID BIRO : ".$id_b." <br>";
						}elseif (strpos($row['AI'], 'Keuangan')) {
							$cbiro = 2;
							$id_b = ($cbiro<10)?"10".$cbiro:"1".$cbiro;
							// echo "ID BIRO : ".$id_b." <br>";
						}elseif (strpos($row['AI'], 'Alumni')) {
							$cbiro = 3;
							$id_b = ($cbiro<10)?"10".$cbiro:"1".$cbiro;
							// echo "ID BIRO : ".$id_b." <br>";
						}elseif (strpos($row['AI'], 'Hukum')) {
							$cbiro = 4;
							$id_b = ($cbiro<10)?"10".$cbiro:"1".$cbiro;
							// echo "ID BIRO : ".$id_b." <br>";
						}
						// $sql = "INSERT INTO biro values (".$id_b.",'".trim($row['AI'])."')";
						// $this->db->truncate($sql);
						// $this->db->query($sql);

					} elseif ($row['A'] == 3) {

					// if ($row['A'] == 3) {
						$cunit++;
						$unit = $id_b."<br>".(($cunit<10)?$cbiro."0".$cunit:$cbiro.$cunit).$row['AI']."<br>";
						$temp = explode(".", $row['AI']);
						$satker_biro = $temp[0];
						// echo $unit;

						$id_c = ($cunit<10)?$cbiro."0".$cunit:$cbiro.$cunit;
						// echo $id_c;
						$ket = trim($row['AI']);
						$temp = explode(".", $ket);
						$satker_biro = $temp[0];
						$ket = substr($ket, 9);
						echo "<br><br>";

						array_push($dataunit, array(
							'kode_satker' => $satker_jatinangor,
							'id_b'      => $satker_biro,
							'id_c'      =>$id_c,
							'ket'      => $ket
						));
						// echo "$satker_biro $id_c -- $ket1<br>";
						// $this->db->truncate('output');
						// $this->db->insert_batch('output', $data);


						// $sql1 = "INSERT INTO unit values (".$satker_biro.",".$id_c.",'".$ket."')";
						// // echo $sql1."<br><br>";
						// // $this->db->truncate($sql1);
						// $this->db->query($sql1);

					} elseif ($row['A'] ==5) {
						$coutput++;                        
						$ket1 = trim($row['AI']);
						$ket1 = substr($ket1, 4);
						array_push($dataoutput, array(
							'kode_satker' => $satker_jatinangor,
							'id_b'      => $satker_biro,
							'id_c'      =>$id_c,
							// 'id_u'      => ($cunit<10)?$cbiro."0".$cunit:$cbiro.$cunit,
							'pagu'      => preg_replace("/[^0-9]/", "", $row['AB']),
							'realisasi' => preg_replace("/[^0-9]/", "", $row['AC']),
							'ket'      => $ket1
						));
						// echo "$satker_biro $id_c -- $ket1<br>";
						// $this->db->truncate('output');
						// $this->db->insert_batch('output', $data);

					}
				}
				$numrow++;
			}
			echo "<br>";
			// var_dump($data);

			echo "</pre>";
			// exit();

			// $this->db->truncate('unit');
			$this->db->insert_batch('unit_sas', $dataunit);
			// $this->db->truncate('output');
			$this->db->insert_batch('output_sas', $dataoutput);
			//delete file from server
			// unlink(realpath('excel/'.$data_upload['file_name']));

			//upload success
			$this->session->set_flashdata('notifpagu', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
			//redirect halaman
			redirect('uploads/v_sas');

		}
	}

	public function uploadRealisasiSulsel()
	{
		// Load plugin PHPExcel nya
		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(isset($_FILES['sulsel']['name']) && in_array($_FILES['sulsel']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['sulsel']['name']);
			$extension = end($arr_file);

			if($extension != 'xlsx') {
				$this->session->set_flashdata('sulsel', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

				redirect("uploads/v_sas"); 
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$loadexcel  = $reader->load($_FILES['sulsel']['tmp_name']);
			$sheet             = $loadexcel->getSheetByName("PAGU_677024")->toArray(null, true, true ,true);

			$data = array();
			$numrow = 1;
			$cbiro = 1;
			$cunit = 0;
			$satker_sulsel = 677024;

			foreach($sheet as $row){
				if($numrow > 7){
					$ket1 = trim($row['A']);
					// echo "$ket1<br>";
					$ket = substr($ket1, 9);
					$temp = explode(" ", $ket1);
					$regex = '/^[0-9]{4}\.[0-9]{3}$/';
					if (preg_match($regex, $temp[0])) {
						$cunit++;
						$satker_biro = explode(".", $temp[0]);

						$id_c = ($cunit<10)?$cbiro."0".$cunit:$cbiro.$cunit;

						 // $sql1 = "INSERT INTO unit_sas values (".$satker_sulsel.",".$id_c.",".$satker_biro[0].",'".$ket."')";
						 // echo "$sql1";
						 // echo "<br>";
						 // $this->db->query($sql1);

						$unitsulsel = array();
						array_push($unitsulsel, array(
							'kode_satker'      => $satker_sulsel,
							'id_c'      => $id_c,
							'id_b'      => $satker_biro[0],
							'ket'      => $ket
						));
						// exit;
						$this->db->insert_batch('unit_sas', $unitsulsel);

					}elseif((strlen($temp[0]) == 3) && (strpos($temp[0], "00") === 0)){
						$ket1 = trim($row['A']);
						$ket1 = substr($ket1, 4);
					   // echo "$ket1<br>";

						$pagu = $row['B'];
					   // echo "pagunya"."$pagu";
						$realisasi = $row['C'];
					   // echo "realisasi"."$realisasi";
					   // echo $row['A']."<br>" ;

						$outputsulsel = array();
						array_push($outputsulsel, array(
							'kode_satker' => $satker_sulsel,
							'id_b'      => $satker_biro[0],
							'id_c'      => $id_c,
							'pagu'      => preg_replace("/[^0-9]/", "", $row['B']),
							'realisasi' => preg_replace("/[^0-9]/", "", $row['C']),
							'ket'      => $ket1
						));
						// exit;
						$this->db->insert_batch('output_sas', $outputsulsel);

					   // $sql2 = "INSERT INTO output_sas values (NULL,".$satker_sulsel.",".$satker_biro[0].",".$id_c.",".preg_replace("/[^0-9]/", "", $row['B']).",".preg_replace("/[^0-9]/", "", $row['C']).",'".$ket1."') ";
					   // echo "$sql2";
					   // echo "<br>";
					   // $this->db->query($sql2);
					}


				}
				$numrow++;
			}
			// $this->db->truncate('unit');
			// $this->db->insert_batch('output', $dataoutput);
			//delete file from server
			// unlink(realpath('excel/'.$data_upload['file_name']));

			//upload success
			$this->session->set_flashdata('notifsulsel', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
			//redirect halaman
			redirect('uploads/v_sas');
		}
	}

	public function uploadRealisasiKalbar()
	{
				// Load plugin PHPExcel nya
		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(isset($_FILES['kalbar']['name']) && in_array($_FILES['kalbar']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['kalbar']['name']);
			$extension = end($arr_file);

			if($extension != 'xlsx') {
				$this->session->set_flashdata('kalbar', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

				redirect("uploads/v_sas"); 
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$loadexcel  = $reader->load($_FILES['kalbar']['tmp_name']);
			$sheet             = $loadexcel->getSheetByName("Sheet1")->toArray(null, true, true ,true);

			$data = array();
			$numrow = 1;
			$cbiro = 1;
			$cunit = 0;
			$satker_kalbar = 683070;

			foreach($sheet as $row){
				if($numrow > 4){
					$ket1 = trim($row['A']);
					// echo "$ket1<br>";
					$ket = substr($ket1, 9);
					$temp = explode(" ", $ket1);
					$regex = '/^[0-9]{4}\.[0-9]{3}$/';
					if (preg_match($regex, $temp[0])) {
						$cunit++;
						$satker_biro = explode(".", $temp[0]);

						$id_c = ($cunit<10)?$cbiro."0".$cunit:$cbiro.$cunit;
						// $sql1 = "INSERT INTO unit_sas values (NULL,".$satker_kalbar.",".$id_c.",".$satker_biro[0].",'".$ket."')";
						// echo "$sql1";
						// echo "<br>";
						// $this->db->query($sql1);

						$unitkalbar = array();
						array_push($unitkalbar, array(
							'kode_satker'      => $satker_kalbar,
							'id_c'      => $id_c,
							'id_b'      => $satker_biro[0],
							'ket'      => $ket
						));
						// exit;
						$this->db->insert_batch('unit_sas', $unitkalbar);

						//  array_push($dataunit, array(
						//     'kode_satker' => $satker_sulsel,
						//     'id_c'      =>$id_c,
						//     'id_b'      => $satker_biro,
						//     'ket'      => $ket1
						// ));
						// echo $id_c;
					}elseif((strlen($temp[0]) == 3) && (strpos($temp[0], "00") === 0)){
						$ket1 = trim($row['A']);
						$ket1 = substr($ket1, 4);
					   // echo "$ket1<br>";

						$pagu = $row['B'];
					   // echo "pagunya"."$pagu";
						$realisasi = $row['C'];
					   // echo "realisasi"."$realisasi";
					   // echo $row['A']."<br>" ;

						$outputkalbar = array();
						array_push($outputkalbar, array(
							'kode_satker' => $satker_kalbar,
							'id_b'      => $satker_biro[0],
							'id_c'      => $id_c,
							'pagu'      => preg_replace("/[^0-9]/", "", $row['B']),
							'realisasi' => preg_replace("/[^0-9]/", "", $row['C']),
							'ket'      => $ket
						));
						// exit;
						$this->db->insert_batch('output_sas', $outputkalbar);

					   // $sql2 = "INSERT INTO output_sas values (NULL,".$satker_kalbar.",".$satker_biro[0].",".$id_c.",".preg_replace("/[^0-9]/", "", $row['B']).",".preg_replace("/[^0-9]/", "", $row['C']).",'".$ket1."') ";
					   // echo "$sql2";
					   // echo "<br>";
					   // $this->db->query($sql2);
					}

				}
				$numrow++;
			}
			// $this->db->truncate('realisasi_kalbar');
			// $this->db->insert_batch('realisasi_kalbar', $data);
			//delete file from server
			unlink(realpath('excel/'.$data_upload['file_name']));

			//upload success
			$this->session->set_flashdata('notifkalbar', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
			//redirect halaman
			redirect('uploads/v_sas');
		}
	}

	public function uploadRealisasiNTB()
	{
				// Load plugin PHPExcel nya
		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(isset($_FILES['ntb']['name']) && in_array($_FILES['ntb']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['ntb']['name']);
			$extension = end($arr_file);

			if($extension != 'xlsx') {
				$this->session->set_flashdata('ntb', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

				redirect("uploads/v_sas"); 
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$loadexcel  = $reader->load($_FILES['ntb']['tmp_name']);
			$sheet             = $loadexcel->getSheetByName("IPDN NTB")->toArray(null, true, true ,true);

			$data = array();
			$numrow = 1;
			$cbiro = 1;
			$cunit = 0;
			$satker_ntb = 683084;

			foreach($sheet as $row){
				if($numrow > 6){
					$ket1 = trim($row['AB']);
					// echo "$ket1<br>";
					$ket = substr($ket1, 9);
					$temp = explode(" ", $ket1);
					$regex = '/^[0-9]{4}\.[0-9]{3}$/';
					if (preg_match($regex, $temp[0])) {
						$cunit++;
						$satker_biro = explode(".", $temp[0]);


						$id_c = ($cunit<10)?$cbiro."0".$cunit:$cbiro.$cunit;
						$unitntb = array();
						array_push($unitntb, array(
							'kode_satker'      => $satker_ntb,
							'id_c'      => $id_c,
							'id_b'      => $satker_biro[0],
							'ket'      => $ket
						));
						// exit;
						$this->db->insert_batch('unit_sas', $unitntb);
					// $sql1 = "INSERT INTO unit_sas values (".$satker_ntb.",".$id_c.",".$satker_biro[0].",'".$ket."')";
					// echo "$sql1";
					// echo "<br>";
					// $this->db->query($sql1);

					}elseif((strlen($temp[0]) == 3) && (strpos($temp[0], "00") === 0)){
						$ket1 = trim($row['AB']);
						$ket1 = substr($ket1, 4);
					   // echo "$ket1<br>";

						$pagu = $row['B'];
					   // echo "pagunya"."$pagu";
						$realisasi = $row['C'];

						$outputntb = array();
						array_push($outputntb, array(
							'kode_satker' => $satker_ntb,
							'id_b'      => $satker_biro[0],
							'id_c'      => $id_c,
							'pagu'      => preg_replace("/[^0-9]/", "", $row['AC']),
							'realisasi' => preg_replace("/[^0-9]/", "", $row['AD']),
							'ket'      => $ket1
						));
						// exit;
						$this->db->insert_batch('output_sas', $outputntb);
				 // $sql2 = "INSERT INTO output_sas values (NULL,".$satker_ntb.",".$satker_biro[0].",".$id_c.",".preg_replace("/[^0-9]/", "", $row['AC']).",".preg_replace("/[^0-9]/", "", $row['AD']).",'".$ket1."') ";
				 // echo "$sql2";
				 // echo "<br>";
				 // $this->db->query($sql2);
					}

				}
				$numrow++;
			}
			// $this->db->truncate('realisasi_ntb');
			// $this->db->insert_batch('realisasi_ntb', $data);
			//delete file from server
			// unlink(realpath('excel/'.$data_upload['file_name']));

			//upload success
			$this->session->set_flashdata('notifntb', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
			//redirect halaman
			redirect('uploads/v_sas');
		}
	}

	public function uploadRealisasiPapua()
	{
				// Load plugin PHPExcel nya
		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(isset($_FILES['papua']['name']) && in_array($_FILES['papua']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['papua']['name']);
			$extension = end($arr_file);

			if($extension != 'xlsx') {
				$this->session->set_flashdata('papua', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

				redirect("uploads/v_sas"); 
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$loadexcel  = $reader->load($_FILES['papua']['tmp_name']);
			$sheet             = $loadexcel->getSheetByName("Sheet1")->toArray(null, true, true ,true);

			$data = array();
			$numrow = 1;
			$cbiro = 1;
			$cunit = 0;
			$satker_papua = 683091;

			foreach($sheet as $row){
				if($numrow > 6){
					$ket1 = trim($row['A']);
					// echo "$ket1<br>";
					$ket = substr($ket1, 9);
					$temp = explode(" ", $ket1);
					$regex = '/^[0-9]{4}\.[0-9]{3}$/';
					if (preg_match($regex, $temp[0])) {
						$cunit++;
						$satker_biro = explode(".", $temp[0]);

						$id_c = ($cunit<10)?$cbiro."0".$cunit:$cbiro.$cunit;
						$unitpapua = array();
						array_push($unitpapua, array(
							'kode_satker'      => $satker_papua,
							'id_c'      => $id_c,
							'id_b'      => $satker_biro[0],
							'ket'      => $ket
						));
						// exit;
						$this->db->insert_batch('unit_sas', $unitpapua);
						// $sql1 = "INSERT INTO unit_sas values (".$satker_papua.",".$id_c.",".$satker_biro[0].",'".$ket."')";
						// echo "$sql1";
						// echo "<br>";
						// $this->db->query($sql1);

					}elseif((strlen($temp[0]) == 3) && (strpos($temp[0], "00") === 0)){
						$ket1 = trim($row['A']);
						$ket1 = substr($ket1, 4);
					   // echo "$ket1<br>";

						$pagu = $row['B'];
					   // echo "pagunya"."$pagu";
						$realisasi = $row['C'];
						$outputpapua = array();
						array_push($outputpapua, array(
							'kode_satker' => $satker_papua,
							'id_b'      => $satker_biro[0],
							'id_c'      => $id_c,
							'pagu'      => preg_replace("/[^0-9]/", "", $row['B']),
							'realisasi' => preg_replace("/[^0-9]/", "", $row['C']),
							'ket'      => $ket1
						));
						// exit;
						$this->db->insert_batch('output_sas', $outputpapua);
					   // $sql2 = "INSERT INTO output_sas values (NULL,".$satker_papua.",".$satker_biro[0].",".$id_c.",".preg_replace("/[^0-9]/", "", $row['B']).",".preg_replace("/[^0-9]/", "", $row['C']).",'".$ket1."') ";
					   // echo "$sql2";
					   // echo "<br>";
					   // $this->db->query($sql2);
					}

				}
				$numrow++;
			}
			// $this->db->truncate('realisasi_papua');
			// $this->db->insert_batch('realisasi_papua', $data);


			//delete file from server
			// unlink(realpath('excel/'.$data_upload['file_name']));

			//upload success
			$this->session->set_flashdata('notifpapua', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
			//redirect halaman
			redirect('uploads/v_sas');
		}
	}

	public function uploadRealisasiSulut()
	{
				// Load plugin PHPExcel nya
		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(isset($_FILES['sulut']['name']) && in_array($_FILES['sulut']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['sulut']['name']);
			$extension = end($arr_file);

			if($extension != 'xlsx') {
				$this->session->set_flashdata('sulut', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

				redirect("uploads/v_sas"); 
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$loadexcel  = $reader->load($_FILES['sulut']['tmp_name']);
			$sheet             = $loadexcel->getSheetByName("Sheet1")->toArray(null, true, true ,true);

			$data = array();
			$numrow = 1;
			$cbiro = 1;
			$cunit = 0;
			$satker_sulut = 677010;

			foreach($sheet as $row){
				if($numrow > 1){
					$ket1 = trim($row['A']);
					// echo "$ket1<br>";
					$ket = substr($ket1, 9);
					$temp = explode(" ", $ket1);
					$regex = '/^[0-9]{4}\.[0-9]{3}$/';
					if (preg_match($regex, $temp[0])) {
						$cunit++;
						$satker_biro = explode(".", $temp[0]);


						$id_c = ($cunit<10)?$cbiro."0".$cunit:$cbiro.$cunit;
						$unitsulut = array();
						array_push($unitsulut, array(
							'kode_satker'  => $satker_sulut,
							'id_c'      => $id_c,
							'id_b'      => $satker_biro[0],
							'ket'      => $ket
						));
						// exit;
						$this->db->insert_batch('unit_sas', $unitsulut);
					// $sql1 = "INSERT INTO unit_sas values (".$satker_sulut.",".$id_c.",".$satker_biro[0].",'".$ket."')";
					// echo "$sql1";
					// echo "<br>";
					// $this->db->query($sql1);

					}elseif((strlen($temp[0]) == 3) && (strpos($temp[0], "00") === 0)){
						$ket1 = trim($row['A']);
						$ket1 = substr($ket1, 4);
					   // echo "$ket1<br>";

						$pagu = $row['B'];
					   // echo "pagunya"."$pagu";
						$realisasi = $row['C'];
						$outputsulut = array();
						array_push($outputsulut, array(
							'kode_satker' => $satker_sulut,
							'id_b'      => $satker_biro[0],
							'id_c'      => $id_c,
							'pagu'      => preg_replace("/[^0-9]/", "", $row['B']),
							'realisasi' => preg_replace("/[^0-9]/", "", $row['C']),
							'ket'      => $ket1
						));
						// exit;
						$this->db->insert_batch('output_sas', $outputsulut);
				 // $sql2 = "INSERT INTO output_sas values (NULL,".$satker_sulut.",".$satker_biro[0].",".$id_c.",".preg_replace("/[^0-9]/", "", $row['B']).",".preg_replace("/[^0-9]/", "", $row['C']).",'".$ket1."') ";
				 // echo "$sql2";
				 // echo "<br>";
				 // $this->db->query($sql2);
					}
				}
				$numrow++;
			}
			// $this->db->truncate('realisasi_sulut');
			// $this->db->insert_batch('realisasi_sulut', $data);
			//delete file from server
			// unlink(realpath('excel/'.$data_upload['file_name']));

			//upload success
			$this->session->set_flashdata('notifsulut', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
			//redirect halaman
			redirect('uploads/v_sas');
		}
	}

	public function uploadRealisasiSumbar()
	{
				// Load plugin PHPExcel nya
		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(isset($_FILES['sumbar']['name']) && in_array($_FILES['sumbar']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['sumbar']['name']);
			$extension = end($arr_file);

			if($extension != 'xlsx') {
				$this->session->set_flashdata('sumbar', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

				redirect("uploads/v_sas"); 
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$loadexcel  = $reader->load($_FILES['sumbar']['tmp_name']);
			$sheet             = $loadexcel->getSheetByName("Sheet1")->toArray(null, true, true ,true);
			$data = array();
			$numrow = 1;
			$cbiro = 1;
			$cunit = 0;
			$satker_sumbar = 677045;


			foreach($sheet as $row){
				if($numrow > 1){
					$ket1 = trim($row['A']);
					// echo "$ket1<br>";
					$ket = substr($ket1, 9);
					$temp = explode(" ", $ket1);
					$regex = '/^[0-9]{4}\.[0-9]{3}$/';
					if (preg_match($regex, $temp[0])) {
						$cunit++;
						$satker_biro = explode(".", $temp[0]);

						$id_c = ($cunit<10)?$cbiro."0".$cunit:$cbiro.$cunit;
						$unitsumbar = array();
						array_push($unitsumbar, array(
							'kode_satker'  => $satker_sumbar,
							'id_c'      => $id_c,
							'id_b'      => $satker_biro[0],
							'ket'      => $ket
						));
						// exit;
						$this->db->insert_batch('unit_sas', $unitsumbar);

						// $sql1 = "INSERT INTO unit_sas values (".$satker_sumbar.",".$id_c.",".$satker_biro[0].",'".$ket."')";
						// echo "$sql1";
						// echo "<br>";
						// $this->db->query($sql1);

						// echo $id_c;
					}elseif((strlen($temp[0]) == 3) && (strpos($temp[0], "00") === 0)){
						$ket1 = trim($row['A']);
						$ket1 = substr($ket1, 4);
					   // echo "$ket1<br>";

						$pagu = $row['B'];
					   // echo "pagunya"."$pagu";
						$realisasi = $row['C'];
						$outputsumbar = array();
						array_push($outputsumbar, array(
							'kode_satker' => $satker_sumbar,
							'id_b'      => $satker_biro[0],
							'id_c'      => $id_c,
							'pagu'      => preg_replace("/[^0-9]/", "", $row['B']),
							'realisasi' => preg_replace("/[^0-9]/", "", $row['C']),
							'ket'      => $ket1
						));
						// exit;
						$this->db->insert_batch('output_sas', $outputsumbar);
					   // $sql2 = "INSERT INTO output_sas values (NULL,".$satker_sumbar.",".$satker_biro[0].",".$id_c.",".preg_replace("/[^0-9]/", "", $row['B']).",".preg_replace("/[^0-9]/", "", $row['C']).",'".$ket1."') ";
					   // echo "$sql2";
					   // echo "<br>";
					   // $this->db->query($sql2);
					}

				}
				$numrow++;
			}
			// $this->db->truncate('realisasi_sumbar');
			// $this->db->insert_batch('realisasi_sumbar', $data);

			//delete file from server
			// unlink(realpath('excel/'.$data_upload['file_name']));

			//upload success
			$this->session->set_flashdata('notifsumbar', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
			//redirect halaman
			redirect('uploads/v_sas');
		}
	}

	public function praja()
	{
				// Load plugin PHPExcel nya
		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(isset($_FILES['praja']['name']) && in_array($_FILES['praja']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['praja']['name']);
			$extension = end($arr_file);

			if($extension != 'xlsx') {
				$this->session->set_flashdata('praja', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');
				
				redirect("uploads/v_praja"); 
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$loadexcel  = $reader->load($_FILES['praja']['tmp_name']);
			$sheet             = $loadexcel->getSheetByName("data")->toArray(null, true, true ,true);
			$data = array();
			$unitpraja = array();
			$unitortu = array();
			$unitwali = array();
			$numrow = 1;
			// $date = STR_TO_DATE($row['AY'], '%d.%m.%y');

			$stop = false;
			$num = 1;
			$nullcc = 0;
			while(!$stop) {
				$row = $sheet[$num++];
				if ($row['B'] == NULL) {
					$nullcc++;
					if ($nullcc == 4) {
						$stop = true;    
					}
				} elseif (strlen($row['D']) == 1){
					$nullcc = 0;

					array_push($unitpraja, array(
						'no' => ($num-1),
						'no_spcp'      => $row['B'],
						'nama'      => $row['C'],
						'jk'      => $row['D'],
						'nisn'      => $row['E'],
						'npwp'      => $row['F'],
						'nik_praja'      => $row['G'],
						'tmpt_lahir'      => $row['H'],
						'tgl_lahir'      => $row['I'],
						'agama'      => $row['J'],
						'alamat'      => $row['K'],
						'rt'      => $row['L'],
						'rw'      => $row['M'],
						'nama_dusun'      => $row['N'],
						'kelurahan'      => $row['O'],
						'kecamatan'      => $row['P'],
						'kode_pos'      =>$row['Q'],
						'kab/kota'      => $row['R'],
						'provinsi'      => $row['S'],
						'jenis_tinggal'      => $row['T'],
						'alat_transport'      => $row['U'],
						'tlp_rumah'      => $row['V'],
						'tlp_pribadi'      => $row['W'],
						'email'      => $row['X'],
						'kewarganegaraan'      => $row['AM'],
						'penerima_pks'      => $row['AN'],
						'no_pks'      => $row['AO'],
						'kode_prodi'      => $row['AW'],
						'jenis_pendaftaran'      =>  $row['AX'],
						'tgl_masuk_kuliah'      =>  $row['AY'],
						'tahun_masuk_kuliah'      => $row['AZ'],
						'pembiayaan'      => $row['BA'],
						'jalur_masuk'      => $row['BB']
					));


					array_push($unitortu, array(
						'nik_praja'      => $row['G'],
						'nik_ayah'      => $row['Y'],
						'nama_ayah'      => $row['Z'],
						'tgllahir_ayah'      => $row['AA'],
						'pendidikan_ayah'      => $row['AB'],
						'pekerjaan_ayah'      => $row['AC'],
						'penghasilan_ayah'      => $row['AD'],
						'tlp_ayah'      => $row['AE'],
						'nik_ibu'      => $row['AF'],
						'nama_ibu'      => $row['AG'],
						'tgllahir_ibu'      => $row['AH'],
						'pendidikan_ibu'      => $row['AI'],
						'pekerjaan_ibu'      => $row['AJ'],
						'penghasilan_ibu'      => $row['AK'],
						'tlp_ibu'      => $row['AL']

					));


					array_push($unitwali, array(
						'nik_praja'      => $row['G'],
						'nik_wali'      => $row['AP'],
						'nama_wali'      => $row['AQ'],
						'tgllahir_wali'      => $row['AR'],
						'pendidikan_wali'      => $row['AS'],
						'pekerjaan_wali'      => $row['AT'],
						'penghasilan_wali'      => $row['AU'],
						'tlp_wali'      => $row['AV']

					));

				}

			}
			// print("<pre>".print_r($unitpraja,true)."</pre>");
			// exit();
			$this->db->insert_batch('praja', $unitpraja);
			$this->db->insert_batch('orangtua', $unitortu);
			$this->db->insert_batch('wali', $unitwali);
			//delete file from server
			// unlink(realpath('excel/'.$data_upload['file_name']));

			//upload success
			$this->session->set_flashdata('praja', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
			//redirect halaman
			redirect('uploads/v_praja');
		}
	}

	function rti($s) {
		$romans = array(
			'M' => 1000,
			'CM' => 900,
			'D' => 500,
			'CD' => 400,
			'C' => 100,
			'XC' => 90,
			'L' => 50,
			'XL' => 40,
			'X' => 10,
			'IX' => 9,
			'V' => 5,
			'IV' => 4,
			'I' => 1,
		);

		// $roman = 'MMMCMXCIX';
		$result = 0;

		foreach ($romans as $key => $value) {
			while (strpos($s, $key) === 0) {
				$result += $value;
				$s = substr($s, strlen($key));
			}
		}
		return $result;
	}

	function ite($s) {
		$months = array(
			'Jan' => "Januari",
			'Feb' => "Februari",
			'Mar' => "Maret",
			'Apr' => "April",
			'May' => "Mei",
			'Jun' => "Juni",
			'Jul' => "Juli",
			'Aug' => "Agustus",
			'Sep' => "September",
			'Oct' => "Oktober",
			'Nov' => "November",
			'Dec' => "Desember"
		);

		$result = "";

		$bi = explode(" ", $s);
		// echo "file: ".$s."<br>";
		foreach ($months as $en => $in) {
			if (strpos(strtoupper($in), strtoupper($bi[1])) === 0) {
				$result = str_replace($bi[1],$en,$s);
			}
		}
		return strtoupper($result);
	}

	function ktt($s) {
		$temp = trim($s);
		$res = $temp;
		$temp = explode(",", $temp);
		$temp_last = count($temp)-1;
		if ((strlen($temp[$temp_last]) < 3) && count($temp) > 1) {
			// berarti koma
			$res = substr_replace($s, ".", -3, 1);
		}
		return str_replace(",", "", $res);
	}
}
