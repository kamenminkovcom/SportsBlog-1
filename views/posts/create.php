<?php $this->title = 'Create Post'; ?>
<script type="text/javascript" src="<?=APP_ROOT?>/ckeditor/ckeditor.js"></script>

<form name="createPost" method="post" action="<?=APP_ROOT?>/posts/create" enctype="multipart/form-data">
    <select name="category" id="category">
        <option value="0" selected="selected">Select a category</option>
        <?php foreach ($this->categories as $category): ?>
          <option value="<?= $category['id']; ?>"><?= htmlspecialchars($category['name']); ?></option>
        <?php endforeach; ?>
    </select>
    <div>
        <input id="title" type="text" placeholder="Title" name="title" />
    </div>
    <div>
        <textarea id="content" name="content" rows="15" cols="100" placeholder="Your post..."></textarea>
        <script type="text/javascript">
            CKEDITOR.replace( 'content' );
        </script>
    </div>
    <div>
        <input style="height: 60px; width: 150px; padding: 5px;" type="submit" name="submit" value="Create post" />
        <a href="<?=APP_ROOT?>/posts">Cancel</a>
    </div>
    <span id="image">Select image to upload:</span>
    <input type="file" name="fileToUpload" id="fileToUpload">
</form>
