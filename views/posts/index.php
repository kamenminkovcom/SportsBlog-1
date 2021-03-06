<?php
    require_once ('./helpers/pagination.php');
    $this->title = 'Posts';
    $postsCount = intval($this->model->countPosts());
    $indexURL = APP_ROOT . '/posts/index/';
?>
<div id="main-wrapper">
    <div class="container">
        <div class="row 200%">
            <div class="8u 12u$(medium)">
                <form action="" method="post">
                    <select name="category" id="category">
                        <option value="0" selected="selected">Search by category</option>
                        <?php foreach ($this->categories as $category): ?>
                            <option style="%" value="<?= $category['id']; ?>"><?= htmlspecialchars($category['name']); ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br>
                    <input style="height: 60px; text-align: center; padding: 5px; width: 150px;" type="submit" name="submit" value="Search" />
                </form>
            <?php if ($postsCount > 0)  : ?>
            <?php foreach ($this->posts as $post) : ?>
                    <?php $pictureURL = ($post['image']) ? $post['image'] : 'content/images/default.jpg'; ?>
                    <div id="content">

                        <!-- Content -->
                        <article>
                            <h2><a href="<?=APP_ROOT?>/posts/view_post/<?=$post['Id']?>"><?= htmlspecialchars($post['title']) ?></a></h2>
                            <span><i>Posted on</i>
                                <?=(new DateTime($post['date']))->format('d-M-Y')?>
                                <i>by </i><?=htmlentities($post['UserName'])?>
                            </span>
                            <br>
                            <span>
                                <i>Category: </i><?=htmlentities($post['category'])?>
                            </span>
                            <p>
                                <img src="<?=APP_ROOT . '/' . $pictureURL; ?>" style="width:150px;height:150px; border-radius: 6px"/>
                            </p>
                            <p><?= cutLongText($post['content'])?></p>
                            <table>
                                <tr>
                                    <td>
                                        <a href="<?=APP_ROOT?>/posts/edit/<?=$post['Id']?>" >Edit</a>
                                        <a href="<?=APP_ROOT?>/posts/view_post/<?=$post['Id']?>" >Comment</a>
                                        <a href="<?=APP_ROOT?>/posts/view_post/<?=$post['Id']?>">View Post</a>
                                        <a href="<?=APP_ROOT?>/posts/delete/<?=$post['Id']?>" >Delete</a>
                                    </td>
                                </tr>
                            </table>
                            <hr>
                        </article>

                    </div>
            <?php endforeach;?>
            <?php endif; ?>

            <?php pagination($postsCount, $indexURL);?>
            </div>
        </div>
    </div>
</div>

