<aside class="Comment__Form">
  <?php comment_form($args = array(
      'title_reply' => 'コメントを残す',
      'label_submit' => __( '送信' , 'default' ),
      'comment_notes_before' => '',
      'title_reply_before' => '<p class="article__text">',
      'title_reply_after' => '</p>',
      'comment_field' => '<p class="comment-form-comment"><label for="comment">メッセージ（必須）</label><textarea id="comment" name="comment" cols="45" rows="4" aria-required="true"></textarea></p>'
    ), $post_id); ?>
</aside>

<aside class="Comment__List">
  <?php wp_list_comments( $args = array(
    'reply_text' => '返信',
    'reverse_top_level' => true
  ), $comments ); ?>
</aside>