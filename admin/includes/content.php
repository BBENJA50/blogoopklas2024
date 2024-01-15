<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1 class="page-header">Alle users</h1>
            <hr>
            <?php
            $users = User::find_all_users();
            ?>

            <table class="table mb-0">
                <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>USERNAME</th>
                    <th>PASSWORD</th>
                    <th>FIRST NAME</th>
                    <th>LAST NAME</th>
                    <th>ACTION</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($users as $user): ?>

                <tr>
                    <td><?php echo $user->id; ?></td>
                    <td class="d-flex align-items-center">
                        <div class="avatar avatar-lg me-3">
                            <img src="../admin/assets/compiled/jpg/2.jpg" alt="avatar" srcset="">
                        </div>
                        <?php echo $user->username; ?>
                    </td>
                    <td><?php echo $user->password; ?></td>
                    <td><?php echo $user->first_name; ?></td>
                    <td><?php echo $user->last_name; ?></td>
                    <td><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail badge-circle badge-circle-light-secondary font-medium-1"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg></a></td>
                </tr>

                <?php endforeach; ?>

                </tbody>
            </table>

        </div>
    </div>
</div>