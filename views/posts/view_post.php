
<?php $this->title = $this->post['title'] ?>
<?php $pictureURL = ($this->post['image']) ? $this->post['image'] : 'content/images/default.jpg'; ?>
<main id="posts">
    <article>
        <h2><?= htmlspecialchars($this->title) ?></h2>
        <div><i>Published on: </i>
            <?= (new DateTime($this->post['date']))->format('d-M-y') ?>
            <i>by</i> <?= htmlentities($this->post['UserName'])?></div>
        <div><i>Category: </i>
            <?=htmlspecialchars($this->post['category'])?>
        </div>
        <p class="content"><?= $this->post['content'] ?></p>
        <img style="width:300px;height:250px; border-radius: 6px" src= "<?=APP_ROOT?>/<?=$pictureURL?> "
    </article>
</main>
<form action="<?= APP_ROOT ?>/posts/createComment/<?= $this->post['Id']?>" method="post">
    <div>
        <div>
            <textarea name="comment" id="" cols="20" rows="3" placeholder="Your comment..."></textarea>
        </div>
    </div>
    <div>
        <div>
            <input style="height: 50px; padding: 5px; width: 150px;" type="submit" id="comment" name="submit_comment" value="Comment"/>
        </div>
    </div>
</form>
<div>
    <br>
</>
<div id="comments">
    <p style="font-size: 30pt; color: #3e3e3e; text-align: center; margin: 15px; padding-top: 5px;">Comments:</p>
    <div style="background: whitesmoke;">
        <br>
    </div>
    <?php foreach ($this-> comments as $comment): ?>
        <form action="<?= APP_ROOT ?>/posts/deleteComment/<?= $this->post['Id']?>/<?=$comment['ID']?>" method="post">
       <div class="date"><i>Commented on:</i>
        <?= (new DateTime($comment['date']))->format('d-M-Y') ?><i> by </i>
        <?= htmlspecialchars($comment['UserName']) ?>
        <p style="color: black;" class="content"><?= $comment['content'] ?></p>
           <div><input style="height: 50px; padding: 5px; font-size: 15pt;" type="submit" name="deleteComment" id="deleteComment" value="Delete"></div>
       </div>
            <div style="background: whitesmoke">
                <br>
            </div>
        </form>
    <?php endforeach ?>
</div>