<table border='1' cellpadding='4' align="center">     
	<tr>         
		<td><strong>Nim</strong></td>         
		<td><strong>Nama</strong></td>  
		<td><strong>Judul</strong></td>  
		<td><strong>Pembimbing</strong></td>  
		<td><strong>Aksi</strong></td>
	</tr> 
	<?php foreach ($news as $news_item): ?> 
    <tr>             
		<td><?php echo $news_item['nim']; ?></td>             
		<td><?php echo $news_item['nama']; ?></td>
		<td><?php echo $news_item['judul']; ?></td>
		<td><?php echo $news_item['pemb']; ?></td>
		<td><a href="<?php echo site_url('news/edit/'.$news_item['nim']); ?>">Edit</a> | <a href="<?php echo site_url('news/delete/'.$news_item['nim']); ?>" onClick="return confirm('Are you sure you want to delete?')">Delete</a> </td>
	</tr> 
	<?php 
		endforeach; 
	?> 
</table>
<p align="center"><a href="<?php echo site_url('news/index'); ?>"> Back</a></p>