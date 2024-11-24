<?php
//var_dump($item);
if (strcmp($item->slug, 'materialy') == 0) { ?>
<li class="nav-item dropdown <?php echo $item->classes; echo ($item->isCurrent)?' active':''; ?>">
  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <?php echo htmlspecialchars($item->text); echo ($item->isCurrent)?' <span class="visually-hidden">(aktualna)</span>':'';?>
  </a>
   <ul class="dropdown-menu dropdown-tlo" aria-labelledby="navbarDropdown">
    <li><a class="dropdown-item" href="/ecg/edytor-tekstu">Edytor tekstu</a></li>
    <li><a class="dropdown-item" href="/ecg/arkusz-kalkulacyjny">Arkusz kalkulacyjny</a></li>
    <li><a class="dropdown-item" href="/ecg/bazy-danych">Baza danych</a></li>
    <li><a class="dropdown-item" href="/ecg/grafika-rastrowa">Grafika rastrowa</a></li>
    <li><a class="dropdown-item" href="/ecg/grafika-wektorowa">Grafika wektorowa</a></li>
    <li><a class="dropdown-item" href="/ecg/grafika-3D">Grafika 3D</a></li>
    <li><a class="dropdown-item" href="/ecg/materialy">Wszystkie</a></li>
   </ul>
</li>
<?php } else { ?>
  <li class="nav-item <?php echo $item->classes; echo ($item->isCurrentPath)?' active':''; ?>">
  <a class="nav-link" href="<?php echo htmlspecialchars($item->link); ?>">
    <?php echo htmlspecialchars($item->text); echo ($item->isCurrentPath)?' <span class="visually-hidden">(aktualna)</span>':'';?>
  </a>
</li>
<?php } ?>

<?php
$pages = return_i18n_pages();
var_dump($pages);
echo '<a class="dropdown-item" href="'.htmlspecialchars($item->link).'">'.htmlspecialchars($item->text).'</a>';
foreach($pages[$item->slug]['children'] as $child) {
	echo '<a class="dropdown-item" href="'.find_url($child, null).'">'.$pages[$child]['menu'].'</a>';
}
?>