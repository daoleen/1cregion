<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $feedback->getId() ?></td>
    </tr>
    <tr>
      <th>User:</th>
      <td><?php echo $feedback->getUserId() ?></td>
    </tr>
    <tr>
      <th>Owner:</th>
      <td><?php echo $feedback->getOwnerId() ?></td>
    </tr>
    <tr>
      <th>Project:</th>
      <td><?php echo $feedback->getProjectId() ?></td>
    </tr>
    <tr>
      <th>Feedback type:</th>
      <td><?php echo $feedback->getFeedbackType() ?></td>
    </tr>
    <tr>
      <th>Cost:</th>
      <td><?php echo $feedback->getCost() ?></td>
    </tr>
    <tr>
      <th>Ball:</th>
      <td><?php echo $feedback->getBall() ?></td>
    </tr>
    <tr>
      <th>Comment:</th>
      <td><?php echo $feedback->getComment() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $feedback->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $feedback->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('feedback/edit?id='.$feedback->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('feedback/index') ?>">List</a>
