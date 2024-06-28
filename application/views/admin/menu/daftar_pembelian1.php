		<div class="row small-spacing">
			<div class="col-xs-12">
				<div class="box-content card">
					<h4 class="box-title">Form Daftar Pesanan Selesai Bulan <?=$this->uri->segment(4)?>, Tahun <?=$this->uri->segment(5)?></h4>
					<div class="card-content" style="overflow-x: auto">
						<table id="tabel-data" class="table table-striped table-bordered display" style="width:100%">
							<thead>
								<tr>
									<th>No</th>
									<th>Tanggal Pembelian</th>
									<th>Kode Produk</th>
									<th>Nama</th>
									<th>Harga</th>
									<th>Status</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $i =1; foreach ($data_pembelian->result() as $key => $value): 
									$ket_pembelian = json_decode($value->ket);
									$cek_produk = $this->madmin->tampil_data_where('tb_produk',array('no' => $value->id_produk));
									// foreach ($cek_produk->result() as $key1 => $value1) ;
									// $ket_produk = json_decode($value1->keterangan);

									if ($value->desain == 0) {
										foreach ($cek_produk->result() as $key1 => $value1) ;
										$ket_produk = json_decode($value1->keterangan);
										if ($value1->kategori == 1) {
											if ($ket_produk->undangan == 1) {
												$kategori = "UA".$value1->no;
											}elseif ($ket_produk->undangan == 2) {
												$kategori = "UN".$value1->no;
											}
										}elseif ($value1->kategori == 2) {
											$kategori = "KN".$value1->no;
										}elseif ($value1->kategori == 3) {
											$kategori = "SP".$value1->no;
										}
									}elseif ($value->desain == 1) {
										if ($value->kategori == 1) {
											if ($ket_pembelian->undangan == 1) {
												$kategori = "UA / Desain sendiri";
											}elseif ($ket_pembelian->undangan == 2) {
												$kategori = "UN / Desain Sendiri";
											}
										}elseif ($value->kategori == 2) {
											$kategori = "KN / Desain Sendiri";
										}elseif ($value->kategori == 3) {
											$kategori = "SP / Desain Sendiri";
										}
									}

									

									$cek_pembeli = $this->madmin->tampil_data_where('tb_pembeli',array('id' =>$value->id_pembeli));
									foreach ($cek_pembeli->result() as $key2 => $value2) ;

									if ($value->desain == 0) {
										if ($value1->kategori != 3) {
											$jumlah_harga = ($ket_produk->harga  * $ket_pembelian->jumlah_kertas +  substr($value2->no_telpon, -3));
											//($ket_pembelian->jenis_kertas * $ket_pembelian->jumlah_kertas ) + $ket_produk->harga + substr($data_pembeli['no_telpon'], -3)
										}elseif ($value1->kategori == 3) {
											$jumlah_harga = $ket_pembelian->lebar * $ket_pembelian->panjang * 12500 * $ket_pembelian->jumlah_kertas + $ket_produk->harga + substr($value2->no_telpon, -3);
											//$ket_pembelian->lebar * $ket_pembelian->panjang * 12500 * $ket_pembelian->jumlah_kertas + $ket_produk->harga + substr($data_pembeli['no_telpon'], -3)
										}
									}elseif ($value->desain == 1) {
										if ($value->kategori != 3) {
											$jumlah_harga = $ket_pembelian->harga * $ket_pembelian->jumlah_kertas + substr($value2->no_telpon, -3);
										}elseif ($value->kategori == 3) {
											$jumlah_harga = (($ket_pembelian->lebar * 12500) + ($ket_pembelian->panjang * 12500)) * $ket_pembelian->jumlah_kertas + substr($value2->no_telpon, -3);
										}
									}
									
									

									$cek_transaksi = $this->madmin->tampil_data_where('tb_transaksi',array('no' => $value->id_transaksi));
									foreach ($cek_transaksi->result() as $key3 => $value3) ;
									$status_transaksi = $value3->ket_admin;
								?>
								<tr>
									<td><?=$i?></td>
									<td><?=$value->waktu_pembelian?></td>
									<td><?=$kategori?></td>
									<td><?=$value2->nama?></td>
									<td>Rp <?=number_format($jumlah_harga)?> / <?=number_format($ket_pembelian->jumlah_kertas)?> pcs </td>
									<td><?=$status_transaksi?></td>
									<td align="center">
										<?php if ($value->id_transaksi == 1 or $value->id_transaksi == 2): ?>
										<a href="<?=base_url()?>admin/daftar_tunggu/<?=$value->no?>"><button type="button" class="btn btn-xs btn-social waves-effect waves-light btn-facebook" title="Lihat Infromasi"><i class="ico fa fa-file-text-o"></i></button></a>	
										<?php endif ?>
										<?php if ($value->id_transaksi == 3  or $value->id_transaksi == 4 or $value->id_transaksi == 5 or $value->id_transaksi == 6 or $value->id_transaksi == 7): ?>
										<a href="<?=base_url()?>admin/daftar_pembelian/<?=$value->no?>"><button type="button" class="btn btn-xs btn-social waves-effect waves-light btn-facebook" title="Lihat Infromasi"><i class="ico fa fa-file-text-o"></i></button></a>	
										<?php endif ?>
										<?php if ($value->id_transaksi == 8  or $value->id_transaksi == 9 or $value->id_transaksi == 10 or $value->id_transaksi == 11 ): ?>
										<a href="<?=base_url()?>admin/daftar_pengembalian/<?=$value->no?>"><button type="button" class="btn btn-xs btn-social waves-effect waves-light btn-facebook" title="Lihat Infromasi"><i class="ico fa fa-file-text-o"></i></button></a>	
										<?php endif ?>


										
									</td>
								</tr>
								<?php $i++; endforeach ?>
								
								
							</tbody>
						</table>
					</div>
				</div>
				<!-- /.box-content -->
			</div>

			
		</div>