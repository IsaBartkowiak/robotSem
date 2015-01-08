<?php foreach ($donnees as $v) { ?>
<div class="entree">
<div id="imgune">
<?php echo $v['date'];?>
</div>
<h2><?php echo $v['titre']; ?></h2>
<p>Orateur : <?php echo $v['orateur']; ?></p>
<p>Lieu : <?php echo $v['lieu'];?></p>
 <?php if (!empty($v['lien'])) { ?><p><a href="<?php echo $v['lien']; ?>">Visiter la page</a></p><?php } ?>
</div>
<?php } ?>