<section class="container section">

    <div class="text-center mb-5">
        <h2 class="h1 font-bold">
            Filters
        </h2>
    </div>

    <?php //debug($data) ?>

    <div class="row mb-5">
        <div class="col-[1/13] md:col-[5/9]">
            <div class="filter flex justify-between gap-1 md:gap-2">
                <button class="filter-btn active" data-filter="all" > Todos</button>
                <button class="filter-btn" data-filter="proyectos" >Proyectos</button>
                <button class="filter-btn" data-filter="distribuidas" >Distribuidas</button>
                <button class="filter-btn" data-filter="estrenadas" >Estrenadas</button>
            </div>
        </div>
    </div>

    <div class="filter-items grid md:grid-cols-3 xg:grid-cols-4 gap-1 md:gap-2">

        <?php 
        
        // $films = array_slice($data['films'], 0, 8);
        $films = $data['films'];

        foreach ( $films as $item ) {

            // debug($item);

            $title = @$item['acfe_flexible_layout_title'];
            $desc = @$item['genero'];
            $cat = @$item['cat'];
            $img = @$item['poster'];

            ?>

            <div class="card filter-item animate"  data-type="<?=$cat?>" data-anim="bottom" >
                <img src="<?php echo $img['url'] ?>" alt='' loading='lazy' decoding='async' />
                <h3 class="h3" >
                    <?php echo $title ?>
                </h3>
                <p>
                    <?php echo $desc ?>
                </p>
            </div>

        <?php } ?>

    </div>
</section>