
<div class="visas view large-9 medium-8 columns content">
    <h3><?= h($visa->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Visatype') ?></th>
            <td><?= h($visa->visatype) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($visa->description) ?></td>
        </tr>
            </table>
    </div>

