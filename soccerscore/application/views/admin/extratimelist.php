<!--<pre>
    <?php print_r($extratime); ?>
</pre>-->
<div class="tabbable">

    <div class="tab-content">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="" class="span1">No</th>
                    <th style="" class="span2">Tanggal</th>
                    <th style="" class="span2"><a href="<?php echo base_url('index.php/administrator/extratimelist?order=negara'); ?>">Negara</a></th>
                    <th style="" class="span2"><a href="<?php echo base_url('index.php/administrator/extratimelist?order=team'); ?>">Team</a></th>
                    <th style="" class="span2">score 1</th>
                    <th style="" class="span2">score 2</th>
                    <th style="" class="span1">Hasil</th>
                    <th style="" class="span2">Action O/U/E</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($extratime as $key => $extra) { ?>
                    <tr>
                        <td style="text-align: center"><?php echo++$key ?></td>
                        <td><?php echo $extra['date'] ?></td>
                        <td><?php echo $extra['negara'] ?></td>
                        <td><?php echo $extra['team'] ?></td>
                        <td><?php echo $extra['score1'] ?></td>
                        <td><?php echo $extra['score2'] ?></td>
                        <td> <?php
                if ($extra['extratime'] == 1) {
                    echo (($extra['score1'] + $extra['score2']) % 2 == 0) ? 'O' : 'E';
                } else {
                    echo '<a href="' . base_url('index.php/administrator/extratimelist') . '">';
                    echo (($extra['score1'] + $rekap['extra']) % 2 == 0) ? 'O' : 'E';
                    echo '</a>';
                }
                    ?></td>
                        <td></td>
                    </tr>
<?php } ?>
            </tbody>
        </table>
    </div>
</div>