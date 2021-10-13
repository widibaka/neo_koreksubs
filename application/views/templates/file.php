        <div class="w-100">

            <h3>File</h3>
            <br />
            <div class="table-responsive">
                <table id="table" class="table table-hover table-striped w-100 align-top" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                        <?php foreach ($thead as $key => $th): ?>
                            <?php if ( $th == 'nama_file' ): ?>
                                <th style="min-width: 350px;" data_key="<?php echo $th ?>"><?php echo strtoupper(str_replace('_', ' ', $th)) ?></th>
                            <?php elseif ( $th == 'id_file' ): ?>
                                <th style="display:none;" data_key="<?php echo $th ?>"><?php echo strtoupper(str_replace('_', ' ', $th)) ?></th>
                            <?php else: ?>
                                <th data_key="<?php echo $th ?>"><?php echo strtoupper(str_replace('_', ' ', $th)) ?></th>
                            <?php endif ?>
                        <?php endforeach ?>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>