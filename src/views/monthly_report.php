<main class="content">
    <?php
        renderTitle(
          'Relatório mensal',
          'Acompanhe seu saldo de horas',
          'icofont-ui-calendar'
        );
    ?>

    <div>
        <form class="mb-4" action="#" method="POST">
            <div class="input-group">
                <?php if($user->is_admin) : ?>
                    <select name="user" id="" class="form-control mr-2" placeholder="Selecine um usuario">
                        <?php
                            foreach($users as $user){
                                $selected = $user->id === $selectedUserid ? 'selected' : '';
                                echo "<option value='{$user->id}' {$selected}>{$user->name}</option>";
                            }
                        ?>
                    </select>
                <?php endif ?>
            <select name="period" id="" class="form-control" placeholder="Selecine um período">
                <?php
                    foreach($periods as $key => $month){
                        $selected = $key === $selectedPeriod ? 'selected' : '';
                        echo "<option value='{$key}' {$selected}>{$month}</option>";
                    }
                ?>
            </select>
            <button type="submit" class="btn btn-success ml-2">
                <i class="icofont-search"></i>
            </button>
            </div>
        </form>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <th>Dia</th>
                <th>Entrada 1</th>
                <th>Saida 1</th>
                <th>Entrada 2</th>
                <th>Saida 2</th>
                <th>Saldo</th>
            </thead>
            <tbody>
                <?php  foreach($report as $registry) : ?>
                    <tr>
                        <td><?=formatDateWithlocale($registry->work_date,'%A,%d de %B de %Y'); ?></td>
                        <td><?=$registry->time1 ?></td>
                        <td><?=$registry->time2 ?></td>
                        <td><?=$registry->time3 ?></td>
                        <td><?=$registry->time4 ?></td>
                        <td><?= $registry->getBalance() ?></td>

                    </tr>
                <?php endforeach ?>
                <tr class="bg-primary text-white">
                    <td>Horas trabalhadas</td>
                    <td colspan="3"><?= $sumOfWOrkedTime ?></td>
                    <td>Saldo mensal</td>
                    <td><?= $balance ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</main>
