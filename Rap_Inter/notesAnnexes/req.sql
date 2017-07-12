--affiche la table b2
select numero_compte, libelle, v_brute, amortissement, v_nette
from tab_rdc_immo_partie2 where mission_id=18

--affiche les rubriques existantes
select rubrique_libelle 
from tab_rubrique_notes_annexes where rubrique_cycle = "immoCo"