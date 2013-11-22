<?php
//btn-danger btn-primary icon-white
$oItem = isset ($oItem) ? $oItem : $oPage; // a var item lista vai existir quando for uma listagem

if (isset($_GET['id'])) {
	$bt_view = '<a href="'.$sPage::getPgListar().'" class="btn  btn-list" title="listar"><i class="icon-th-list"></i></a>';	
}else{
	$bt_view = '<a href="'.$sPage::getPgDetalhe().'?id=' . $oItem->id . '" title="detalhes"  class="btn btn-list"><i class="icon-search"></i></a>';	
}

$bt_edit = '<a href="'.$sPage::getPgEditar().'?id=' . $oItem->id . '" class="btn btn-list" title="editar"><i class="icon-pencil "></i></a>';

$bt_del = '<a class="btn btn-list js-delete-item" href="'.DIR_HTM_ROOT.'admin/excluir.php?id=' . $oItem->id . '&classe='.$sPage.'" title="excluir"><i class="icon-remove "></i></a>';

$classe_visibilidade = $oItem->status==1 ? 'btn-success' : '';
$bt_olho = '<a href="'.DIR_HTM_ROOT.'admin/ajax.php" class="btn js-change-visibility btn-list visible-false '.$classe_visibilidade.'" data-classe="'.$sPage.'" data-id="' . $oItem->id . '" title="status"><i class="icon-eye-open"></i></a>';

$botoes_edicao = $bt_view . $bt_edit . $bt_del . $bt_olho;

return $botoes_edicao;
