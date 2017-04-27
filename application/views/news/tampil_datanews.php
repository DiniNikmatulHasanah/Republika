
<table id="dynamic-table" class="table table-striped table-bordered table-hover" >
	<thead>
	<p>
<a href="<?php echo base_url();?>index.php/news/tambah" class="btn btn-primary btn-small">Tambah Data</a>
</p> 
		<tr>
			
			<th> Id News</th>
			<th> Title</th>
			<th> Content</th>
			<th> Kategori</th>
			<th> Image</th>		
			<th> Aksi</th>
		</tr>
	</thead>
	<tbody>
		<tr>
		<?php 
				//$no = 1;
				foreach ($data -> result() as $row) {
				?>
					<!--<td><?php echo $no++; ?></td>-->
					<td><?php echo $row->id_news; ?></td>
					<td><?php echo $row->title; ?></td>
					<td><?php echo $row->content; ?></td>
					<td><?php echo $row->kategori; ?></td>
					<td><?php echo $row->image; ?></td>	

								
					<td>
						<a href="<?php echo base_url()?>index.php/news/edit/<?php echo $row->id_news; ?>">Edit</a>
						<a href="<?php echo base_url(); ?>index.php/news/delete/<?php echo $row->id_news; 
						?>" OnClick="return confirm('Anda yakin ingin menghapus?')">Delete</a>
						
						<!-- <?php if($row->status_post != "published"){ ?>
						<a href="<?php echo base_url()?>index.php/post/published/<?php echo $row->id_post; ?>">Published</a>
						<?php } ?>

						<?php if($row->status_post != "published"){ ?>
						<a href="<?php echo base_url()?>index.php/post/read/<?php echo $row->id_post; ?>">Read</a>
						<?php } ?> -->
					</td>

		</tr>
		<?php } ?>
	</tbody>
</table>
