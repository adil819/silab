      <div class="content print">
        <div class="row">
         <div class="col-md-12">
            <div class="card">
              <div class="card-header"><b>Laporan</b> </h4>
              <hr>
              </div>
              <div class="card-body">
                <div class="">
                <center><b>PT. Pupuk Nutrifit Indonesia</b></center>
                  <center>Laporan Laba Rugi</center>
                  <center>Per Tanggal <?=date('d F Y')?></center>
                <hr>
                <br>
                 &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<b>Pendapatan</b>
                 <section style="margin-left: 20px;">
                  <?php foreach ($totalPurchase as $key) {
                      $key->jumlah;
                      }?>
                      <br>
                      &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Pendapatan Penjualan <span style="margin-left: 200px">Rp.<?=number_format($key->jumlah,0,'.','.')?></span>
                      <br><br><br>
                  &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Total Pendapatan <span style="margin-left: 400px">Rp.<?=number_format($key->jumlah,0,'.','.')?></span>
                </section>
                <br>
                <br>
                <br>
                <br>
                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<b>Biaya</b>
                <section style="margin-left: 20px;">
                  <?php foreach ($totalSales as $row) {
                      $row->jumlah;
                      }?>
                      <br>
                      &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Pembelian Barang <span style="margin-left: 220px">Rp.<?=number_format($row->jumlah,0,'.','.')?></span>
                      <br><br><br>
                  &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Total Biaya <span style="margin-left: 430px">Rp.<?=number_format($row->jumlah,0,'.','.')?></span>
                </section>
                <br>
                <br>
                <br>
                <br>
                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<b>Laba Bersih <span style="margin-left: 500px">Rp.<?=number_format($key->jumlah-$row->jumlah,0,'.','.')?></b>
                <br>
                <a class="btn btn-sm btn-warning pull-right" target="_blank" href="<?=base_url()?>index.php/distributor/report/printdata"><i class="fa fa-print"></i></a>
                </div>
              </div>
            </div>
          </div>
          </span>
        </b>
        </div>
        </div>