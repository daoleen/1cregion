<h1>Portfolio works List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>User</th>
      <th>Name</th>
      <th>Description</th>
      <th>Category</th>
      <th>Image</th>
      <th>Link</th>
      <th>Cost</th>
      <th>Cost currency</th>
      <th>Term</th>
      <th>Term options</th>
      <th>File src</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($portfolio_works as $portfolio_work): ?>
    <tr>
      <td><a href="<?php echo url_for('portfolio_show', $portfolio_work); ?>"><?php echo $portfolio_work->getId() ?></a></td>
      <td><?php echo $portfolio_work->getUserId() ?></td>
      <td><?php echo $portfolio_work->getName() ?></td>
      <td><?php echo $portfolio_work->getDescription() ?></td>
      <td><?php echo $portfolio_work->getCategoryId() ?></td>
      <td><?php echo $portfolio_work->getImage() ?></td>
      <td><?php echo $portfolio_work->getLink() ?></td>
      <td><?php echo $portfolio_work->getCost() ?></td>
      <td><?php echo $portfolio_work->getCostCurrencyId() ?></td>
      <td><?php echo $portfolio_work->getTerm() ?></td>
      <td><?php echo $portfolio_work->getTermOptions() ?></td>
      <td><?php echo $portfolio_work->getFileSrc() ?></td>
      <td><?php echo $portfolio_work->getCreatedAt() ?></td>
      <td><?php echo $portfolio_work->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php if($sf_user->getGuardUser() == $user): ?>
  <a href="<?php echo url_for('portfolio_new', $sf_user->getGuardUser()); ?>">New</a>
<?php endif; ?>