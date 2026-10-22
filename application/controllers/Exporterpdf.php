<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	define('FPDF_FONTPATH', 'font/');

class Exporterpdf extends CI_Controller { 
	public function __construct() { 
		parent::__construct(); 
		// Modèles 
		$this->load->model('Saisirnote_model');
		$this->load->model('Trimestre_model'); 
		$this->load->model('Eleve_model'); 
		$this->load->model('Matiere_model'); 
		$this->load->model('Classe_model'); 
		// Librairie FPDF 
		$this->load->library('FPDF'); 
	} 
	/** * Point d'entrée */ 
	public function index() {
		$role = $this->session->userdata('role'); 
		// Autorisation 
		if ($role !== 'admin') {
			show_error('Accès non autorisé.', 403); return; 
		} 
		$this->showpdf(); 
	} /** * Génération du relevé de notes PDF */
	public function showpdf() { 
		// Récupération des paramètres URL 
		$numtrimestre = $this->uri->segment(3, -1); 
		$matricule = $this->uri->segment(4, -1); 
		// Vérification des paramètres 
		if ($numtrimestre == -1 || $matricule == -1) { 
			show_error('Paramètres manquants.', 400); 
			return; 
		} 
		// ----------------------------------------------------------------- 
		// Récupération des données
		// ----------------------------------------------------------------- 
		$trimestre = $this->Trimestre_model->find($numtrimestre); 
		$eleve = $this->Eleve_model->find($matricule); 
		$listenotes = $this->Saisirnote_model ->getNoteParMatriTrimestre( $matricule, $numtrimestre );
		$moytrimestre = $this->Saisirnote_model ->getMoyenneParMatriTrimestre( $matricule, $numtrimestre );
		$rangtrimestre = $this->Saisirnote_model ->getRangParMatriTrimestre( $matricule, $numtrimestre ); 
		// Vérification des données
		if (!$trimestre) { 
			show_error('Trimestre introuvable.', 404); 
			return; 
		}
		if (!$eleve) { 
			show_error('Élève introuvable.', 404); return; 
		} 
		// Valeurs par défaut 
		$moygentrim = '-'; 
		$rangpartrim = '-'; 
		if (!empty($moytrimestre)) { 
			$moygentrim = $moytrimestre[0]->moygen; 
		} 
		if (!empty($rangtrimestre)) { 
			$rangpartrim = $rangtrimestre[0]->rang; 
		} 
		// ----------------------------------------------------------------- 
		// Création du PDF 
		// -----------------------------------------------------------------
		$pdf = new FPDF('P', 'mm', 'A4'); 
		$pdf->SetTitle(utf8_decode('Relevé de notes - ' . $eleve->nom)); 
		$pdf->SetAuthor('Application de gestion scolaire'); 
		$pdf->SetMargins(15, 15, 15); 
		$pdf->SetAutoPageBreak(true, 15); 
		$pdf->AddPage(); 
		// ----------------------------------------------------------------- 
		// EN-TÊTE 
		// -----------------------------------------------------------------
		$pdf->SetFillColor(41, 128, 185); 
		$pdf->SetTextColor(255, 255, 255); 
		$pdf->SetFont('Arial', 'B', 16); 
		$pdf->Cell( 180, 12, utf8_decode(utf8_decode('RELEVE DE NOTES')), 0, 1, 'C', true ); 
		$pdf->Ln(5); 
		// ----------------------------------------------------------------- 
		// INFORMATIONS TRIMESTRE
		// -----------------------------------------------------------------
		$pdf->SetTextColor(0, 0, 0); $pdf->SetFont('Arial', 'B', 10); 
		$pdf->Cell( 35, 7, utf8_decode('Année scolaire :'), 0, 0, 'L' ); 
		$pdf->SetFont('Arial', '', 10); 
		$pdf->Cell( 60, 7, utf8_decode('2026 - 2027'), 0, 0, 'L' );
		$pdf->SetFont('Arial', 'B', 10); 
		$pdf->Cell( 35, 7, utf8_decode('Trimestre :'), 0, 0, 'L' );
		$pdf->SetFont('Arial', '', 10); 
		$pdf->Cell( 50, 7, utf8_decode($trimestre->numtrimestre), 0, 1, 'L' ); 
		$pdf->SetFont('Arial', 'B', 10); 
		$pdf->Cell( 35, 7, utf8_decode('Libellé :'), 0, 0, 'L' ); 
		$pdf->SetFont('Arial', '', 10); 
		$pdf->Cell( 60, 7, utf8_decode($trimestre->libtrimestre), 0, 0, 'L' ); 
		$pdf->SetFont('Arial', 'B', 10); 
		$pdf->Cell( 35, 7, utf8_decode('Période :'), 0, 0, 'L' ); 
		$pdf->SetFont('Arial', '', 10); 
		$pdf->Cell( 50, 7, utf8_decode( $trimestre->debuttrim . ' au ' . $trimestre->fintrim ), 0, 1, 'L' );
		$pdf->Ln(5); 
		// ----------------------------------------------------------------- 
		// INFORMATIONS ÉLÈVE 
		// -----------------------------------------------------------------
		$pdf->SetFillColor(236, 240, 241); 
		$pdf->SetFont('Arial', 'B', 11); 
		$pdf->Cell( 180, 8, utf8_decode('INFORMATIONS DE L\'ÉLÈVE'), 1, 1, 'L', true ); 
		$pdf->SetFont('Arial', '', 10); 
		// Ligne 1 
		$pdf->Cell( 25, 7, utf8_decode('Nom :'), 1, 0, 'L' ); 
		$pdf->Cell( 65, 7, utf8_decode($eleve->nom), 1, 0, 'L' ); 
		$pdf->Cell( 25, 7, utf8_decode('Prénom :'), 1, 0, 'L' ); 
		$pdf->Cell( 65, 7, utf8_decode($eleve->prenom), 1, 1, 'L' );
		// Ligne 2 
		$pdf->Cell( 25, 7, utf8_decode('Matricule :'), 1, 0, 'L' );
		$pdf->Cell( 65, 7, utf8_decode($eleve->matricule), 1, 0, 'L' );
		$pdf->Cell( 25, 7, utf8_decode('N° classe :'), 1, 0, 'L' ); 
		$pdf->Cell( 65, 7, utf8_decode($eleve->numerodeclasse), 1, 1, 'L' ); 
		// Ligne 3
		$pdf->Cell( 25, 7, utf8_decode('Classe :'), 1, 0, 'L' ); 
		$pdf->Cell( 65, 7, utf8_decode($eleve->idclasse), 1, 0, 'L' ); 
		$pdf->Cell( 25, 7, utf8_decode('Trimestre :'), 1, 0, 'L' ); 
		$pdf->Cell( 65, 7, utf8_decode($trimestre->libtrimestre), 1, 1, 'L' ); 
		$pdf->Ln(7);
		// ----------------------------------------------------------------- 
		// TABLEAU DES NOTES
		// ----------------------------------------------------------------- 
		$pdf->SetFont('Arial', 'B', 9); 
		// Couleur de l'en-tête
		$pdf->SetFillColor(52, 73, 94); 
		$pdf->SetTextColor(255, 255, 255);
		$pdf->Cell(18, 9, utf8_decode('ID'), 1, 0, 'C', true); 
		$pdf->Cell(52, 9, utf8_decode('MATIÈRE'), 1, 0, 'C', true); 
		$pdf->Cell(25, 9, utf8_decode('NOTE DS'), 1, 0, 'C', true); 
		$pdf->Cell(25, 9, utf8_decode('CAHIER'), 1, 0, 'C', true); 
		$pdf->Cell(30, 9, utf8_decode('COMPORTEMENT'), 1, 0, 'C', true); 
		$pdf->Cell(30, 9, utf8_decode('MOYENNE'), 1, 1, 'C', true); 
		// Corps du tableau 
		$pdf->SetTextColor(0, 0, 0); 
		$pdf->SetFont('Arial', '', 9); 
		if (!empty($listenotes)) { 
			$ligne = 0; 
			foreach ($listenotes as $listenote) { 
			// Alternance des couleurs 
			if ($ligne % 2 == 0) { 
				$pdf->SetFillColor(245, 245, 245); 
			} else { 
				$pdf->SetFillColor(255, 255, 255); } $pdf->Cell( 18, 8, $listenote->idmatiere, 1, 0, 'C', true );
				$pdf->Cell( 52, 8, utf8_decode($listenote->nommatiere), 1, 0, 'L', true ); 
				$pdf->Cell( 25, 8, $listenote->noteds, 1, 0, 'C', true ); 
				$pdf->Cell( 25, 8, $listenote->notecahier, 1, 0, 'C', true ); 
				$pdf->Cell( 30, 8, $listenote->notecomportement, 1, 0, 'C', true ); 
				$pdf->Cell( 30, 8, $listenote->moyenne, 1, 1, 'C', true ); 
				$ligne++; 
			} 
		} else { 
			$pdf->Cell( 180, 10, utf8_decode('Aucune note disponible pour ce trimestre.'), 1, 1, 'C' ); 
		} // ----------------------------------------------------------------- 
		// MOYENNE ET RANG 
		// -----------------------------------------------------------------
		$pdf->Ln(5); $pdf->SetFont('Arial', 'B', 10);
		// Moyenne générale 
		$pdf->SetFillColor(236, 240, 241); 
		$pdf->Cell( 150, 9, utf8_decode('MOYENNE GÉNÉRALE DU TRIMESTRE'), 1, 0, 'R', true ); 
		$pdf->SetFillColor(255, 243, 205); 
		$pdf->Cell( 30, 9, utf8_decode($moygentrim), 1, 1, 'C', true );
		// Rang 
		$pdf->SetFillColor(236, 240, 241); 
		$pdf->Cell( 150, 9, utf8_decode('RANG'), 1, 0, 'R', true ); 
		$pdf->SetFillColor(212, 237, 218); 
		$pdf->Cell( 30, 9, utf8_decode($rangpartrim), 1, 1, 'C', true ); 
		// ----------------------------------------------------------------- 
		// OBSERVATION 
		// -----------------------------------------------------------------
		$pdf->Ln(8); $pdf->SetFont('Arial', 'B', 10); 
		$pdf->Cell( 180, 8, utf8_decode('OBSERVATION'), 1, 1, 'L', true ); 
		$pdf->SetFont('Arial', '', 9); 
		$pdf->MultiCell( 180, 8, utf8_decode( 'Ce relevé présente les résultats obtenus par l’élève ' . 'au cours du trimestre.' ), 1, 'L' ); 
		// -----------------------------------------------------------------
		// PIED DE PAGE 
		// -----------------------------------------------------------------
		$pdf->Ln(10); $pdf->SetFont('Arial', 'I', 8); 
		$pdf->Cell( 180, 6, utf8_decode( 'Document généré automatiquement par l\'application de gestion scolaire.' ), 0, 1, 'C' ); 
		// ----------------------------------------------------------------- 
		// SORTIE PDF 
		// ----------------------------------------------------------------- 
		$nomFichier = 'releve_' . $eleve->matricule . '_trimestre_' . $numtrimestre . '.pdf'; 
		$pdf->Output('I', $nomFichier); 
	} 
}