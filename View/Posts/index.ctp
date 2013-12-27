
<div class="col-md-9">

    <form novalidate name="myForm" class="css-form" >
        <div class="form-group">
            <input type="text" data-ng-model="search" class="search-query form-control" placeholder="Search name">
        </div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>&nbsp;</td>
                <td>
                    <input name="name" type="text" ng-pattern="/[A-Za-z]/" data-ng-model="newUser.name" ng-minlength="3"  required>
                    <span class="error" ng-show="myForm.name.$error.minlength">Too short!</span>
                    <span class="error" ng-show="myForm.name.$error.pattern">Please enter name!</span>

                </td>
                <td>
                    <input type="number" name="age" ng-pattern="/[0-9^.]/" ng-minlength="1" ng-maxlength="3" data-ng-model="newUser.age" required>
                    <span class="error" ng-show="myForm.age.$error.minlength">Too short!</span>
                    <span class="error" ng-show="myForm.age.$error.maxlength">Too large!</span>
                    <span class="error" ng-show="myForm.age.$error.pattern">not a number!</span>
                </td>
                <td>
                    <select data-ng-model="newUser.gender" required>
                        <option selected="" value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </td>
                <th>
                    <input type="button" ng-disabled="myForm.$invalid" class="btn btn-success" ng-click="addNewUser()" value="Add">
                </th>
            </tr>

            <tr data-ng-repeat="user in users | filter:search | orderBy:'id'">
                <td data-ng-bind="user.id"></td>
                <td data-ng-bind="user.name"></td>
                <td data-ng-bind="user.age"></td>
                <td data-ng-bind="user.gender"></td>

                <th>
                    <a href="#/edit/{{user.id}}"><i class="glyphicon glyphicon-pencil"></i></a>
                    <a href="#/delete/{{user.id}}"><i class="glyphicon glyphicon-trash"></i></a>
                </th>
            </tr>
            </tbody>
        </table>
    </form>
</div>

<style type="text/css">
    .error{
        color: #b92c28;
    }
</style>





<!--<div class="posts index">-->
<!--	<h2>--><?php //echo __('Posts'); ?><!--</h2>-->
<!--	<table cellpadding="0" cellspacing="0">-->
<!--	<tr>-->
<!--			<th>--><?php //echo $this->Paginator->sort('id'); ?><!--</th>-->
<!--			<th>--><?php //echo $this->Paginator->sort('title'); ?><!--</th>-->
<!--			<th>--><?php //echo $this->Paginator->sort('description'); ?><!--</th>-->
<!--			<th>--><?php //echo $this->Paginator->sort('created'); ?><!--</th>-->
<!--			<th>--><?php //echo $this->Paginator->sort('modified'); ?><!--</th>-->
<!--			<th class="actions">--><?php //echo __('Actions'); ?><!--</th>-->
<!--	</tr>-->
<!--	--><?php //foreach ($posts as $post): ?>
<!--	<tr>-->
<!--		<td>--><?php //echo h($post['Post']['id']); ?><!--&nbsp;</td>-->
<!--		<td>--><?php //echo h($post['Post']['title']); ?><!--&nbsp;</td>-->
<!--		<td>--><?php //echo h($post['Post']['description']); ?><!--&nbsp;</td>-->
<!--		<td>--><?php //echo h($post['Post']['created']); ?><!--&nbsp;</td>-->
<!--		<td>--><?php //echo h($post['Post']['modified']); ?><!--&nbsp;</td>-->
<!--		<td class="actions">-->
<!--			--><?php //echo $this->Html->link(__('View'), array('action' => 'view', $post['Post']['id'])); ?>
<!--			--><?php //echo $this->Html->link(__('Edit'), array('action' => 'edit', $post['Post']['id'])); ?>
<!--			--><?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $post['Post']['id']), null, __('Are you sure you want to delete # %s?', $post['Post']['id'])); ?>
<!--		</td>-->
<!--	</tr>-->
<?php //endforeach; ?>
<!--	</table>-->
<!--	<p>-->
<!--	--><?php
//	echo $this->Paginator->counter(array(
//	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
//	));
//	?><!--	</p>-->
<!--	<div class="paging">-->
<!--	--><?php
//		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
//		echo $this->Paginator->numbers(array('separator' => ''));
//		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
//	?>
<!--	</div>-->
<!--</div>-->
<!--<div class="actions">-->
<!--	<h3>--><?php //echo __('Actions'); ?><!--</h3>-->
<!--	<ul>-->
<!--		<li>--><?php //echo $this->Html->link(__('New Post'), array('action' => 'add')); ?><!--</li>-->
<!--	</ul>-->
<!--</div>-->
