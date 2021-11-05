<div class="row border-bottom">
  <div class="offset-1 col-12 ">

    <p class="h1 text-break"><?php echo $question[0]['title'] ?></p>
    <p class="h5 text-break">Category: <?php echo $question[0]['category'] ?>
      | <?php echo $question[0]['timeCreated'] ?></p>
    <p class="h2 pb-5 text-break"><?php echo $question[0]['description'] ?></p>
  </div>
</div>


<div class="d-flex justify-content-center mb-4">
  <span class="h1">Answers</span>
</div>
<?php if (isset($_SESSION['authorize']['id'])): ?>
  <form class="border-bottom pb-4" action="/question/<?php echo $question[0]['id'] ?>" method="post">
    <div class="form-group bor">
      <label for="answer">Your answer</label>
      <textarea rows="7" class="form-control" id="answer" type="text" name="newAnswer"></textarea>
    </div>
    <button class="btn btn-primary" type="submit" name="enter">Answer</button>
  </form>
<?php endif; ?>
<?php if (!isset($_SESSION['authorize']['id'])): ?>
  <div class="d-flex justify-content-center mb-4">
    <p class="h3">U can not answer and vote on this question, pls login or register</p>
  </div>
  <div class="d-flex justify-content-end mb-4 border-bottom pb-4  ">
    <a class="mr-3 btn btn-primary" href="/account/login">login</a><br>
    <a class="btn btn-primary" href="/account/register">register</a>
  </div>
<?php endif; ?>


<?php foreach ($answers as $answer): ?>

  <p class="h4"><?php echo $answer['answer'] ?></p>
  <p>By <?php echo $answer['name'] ?> | Answered: <?php echo $answer['timeCreated'] ?></p>


  <?php $likes = explode(",", $answer['likesByUsers']);
  $dislikes = explode(",", $answer['dislikesByUsers']);

  if (isset($_SESSION['authorize']['id'])) {
    global $checkUserLiked;
    global $checkUserDisliked;

    foreach ($likes as $like) {

      if ($_SESSION['userId'] == $like) {
        $checkUserLiked = true;
        echo '<span class="text-primary">' . 'you already liked this answer' . '</span>';
        break;
      }
      $checkUserLiked = false;
    }
    foreach ($dislikes as $dislike) {

      if ($_SESSION['userId'] == $dislike) {
        $checkUserDisliked = true;
        echo '<span class="text-danger">' . 'you already disliked this answer' . '</span>';
        break;
      }
      $checkUserDisliked = false;
    }

    foreach ($likes as $like) {

      if (empty($checkUserLiked) && empty($checkUserDisliked)) {
        echo '<p class="border-bottom pb-4">' . $answer['likes'] . '<a class="" href="/question/like/' . $answer['id'] . '"' . '> like</a> | ' . $answer['dislikes'] . ' <a href="/question/dislike/' . $answer['id'] . '"' . '>dislike</a></p>';
        break;
      } elseif ($checkUserLiked || $checkUserDisliked) {
        echo '<p class="border-bottom pb-4  ">' . $answer['likes'] . ' like | ' . $answer['dislikes'] . ' dislike</p>';
        break;
      }
    }
  } else {
    echo '<p class="border-bottom pb-4">' . $answer['likes'] . ' like | ' . $answer['dislikes'] . ' dislike</p>';
  }
endforeach; ?>


