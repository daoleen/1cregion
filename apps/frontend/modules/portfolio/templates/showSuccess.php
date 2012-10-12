<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $portfolio_work->getId() ?></td>
    </tr>
    <tr>
      <th>User:</th>
      <td><?php echo $portfolio_work->getUserId() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $portfolio_work->getName() ?></td>
    </tr>
    <tr>
      <th>Description:</th>
      <td><?php echo $portfolio_work->getDescription() ?></td>
    </tr>
    <tr>
      <th>Category:</th>
      <td><?php echo $portfolio_work->getCategoryId() ?></td>
    </tr>
    <tr>
      <th>Image:</th>
      <td><?php echo $portfolio_work->getImage() ?></td>
    </tr>
    <tr>
      <th>Link:</th>
      <td><?php echo $portfolio_work->getLink() ?></td>
    </tr>
    <tr>
      <th>Cost:</th>
      <td><?php echo $portfolio_work->getCost() ?></td>
    </tr>
    <tr>
      <th>Cost currency:</th>
      <td><?php echo $portfolio_work->getCostCurrencyId() ?></td>
    </tr>
    <tr>
      <th>Term:</th>
      <td><?php echo $portfolio_work->getTerm() ?></td>
    </tr>
    <tr>
      <th>Term options:</th>
      <td><?php echo $portfolio_work->getTermOptions() ?></td>
    </tr>
    <tr>
      <th>File src:</th>
      <td><?php echo $portfolio_work->getFileSrc() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $portfolio_work->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $portfolio_work->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<?php if($portfolio_work->User == $sf_user->getGuardUser()): ?>
    <a href="<?php echo url_for('portfolio_edit', $portfolio_work); ?>">Edit</a>&nbsp;
<?php endif; ?>
<a href="<?php echo url_for('portfolio', $portfolio_work->User); ?>">List</a>
