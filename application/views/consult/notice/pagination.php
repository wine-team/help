<div class="pagination pagination-right">
    <font>共<span><?php echo $all_rows;?></span>条</font>
    <font><span><?php echo $pg_now;?></span>/<span><?php echo ceil($all_rows/$pg_num);?></span>页</font>
    <font>每页<span><?php echo $pg_num;?></span>条</font>
    <?php echo $pg_link;?>
</div>