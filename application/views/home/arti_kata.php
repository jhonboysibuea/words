

            <!--Section: Jumbotron-->
            <section class="card wow fadeIn" style="background-image: url(https://mdbootstrap.com/img/Photos/Others/gradient1.jpg);">

                <!-- Content -->
                <div class="card-body text-white text-center py-sm-5 px-sm-5 my-sm-5">
                    <form method="post" action="<?php echo base_url() ?>home/find" id="findWord">
                            
                        <h1 class="mb-4 jumbotext">
                            <strong>Cari Kata Di Kamus Besar Bahasa Indonesia</strong>
                        </h1>
                        <input autocomplete="off" type="text" name="word" class="form-control" placeholder="Masukan kata, misal : cinta" value="<?php echo $row->id ?>">
                        <button type="submit" class="btn btn-outline-white btn-lg" style="border-radius: 10rem;">Cari
                            <i class="fa fa-graduation-cap ml-2"></i>
                        </button>

                    </form>

                    <div id="result" class="result">
                        <div><h3>Definisi dari kata <?php echo $row->id ?></h3></div>
                        <div><?php echo $row->definition ?></div>
                    </div>
                </div>
                <!-- Content -->
            </section>
            <!--Section: Jumbotron-->
            