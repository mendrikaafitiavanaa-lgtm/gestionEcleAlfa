<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Suppression</h4>
      </div>
      <div class="modal-body" id="deleteModalContent">
      </div>
    </div>
  </div>
</div>



<div class="card border-0 shadow-sm">

        <div class="card-header bg-light d-flex justify-content-between align-items-center">

            <h5 class="mb-0 fw-bold">
                <i class="bi bi-list-ul text-primary"></i>
               Liste
            </h5>

             <!-- Bouton retour -->
             <div class="text-center mb-4">
                <?php echo anchor(
                    'ens/index',
                    '<i class="bi bi-arrow-left-circle"></i> Retour',
                    'class="btn btn-success btn-sm px-4"'
                ); ?>
            </div>

        </div>


        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-primary">
                        <tr>
                            <th class="text-center"> # </th>
                            <th> Date </th>
                            <th> Horaire </th>
                            <th> Titre </th> 
                            <th> Contenu </th>
                            <th> Travail à faire </th>
                            <th class="text-center">  Actions </th>
                        </tr>

                    </thead>


                    <tbody>

                        <?php if (!empty($cahiers)) : ?>

                            <?php $numero = 1; ?>

                            <?php foreach ($cahiers as $cahier) : ?>

                                <tr>

                                    <!-- Numéro -->
                                    <td class="text-center fw-bold">
                                        <?php echo $numero++; ?>
                                    </td>

                                    <!-- Daty -->
                                    <td class="text-center fw-bold">
                                        <?php echo $cahier->datecours; ?>
                                    </td>

                                    <!-- Horaire -->
                                    <td>

                                        <span class="badge bg-success">
                                            <?php echo $cahier->heuredebut; ?>
                                        </span>

                                        <br>

                                        <small class="text-muted">
                                            à
                                        </small>

                                        <br>

                                        <span class="badge bg-danger">
                                            <?php echo $cahier->heurefin; ?>
                                        </span>

                                    </td>


                                    <!-- Titre -->
                                    <td>

                                        <strong>
                                            <?php echo htmlspecialchars($cahier->titre); ?>
                                        </strong>

                                    </td>


                                    <!-- Contenu -->
                                    <td>

                                        <div style="max-width:350px;">

                                            <?php
                                            echo nl2br(
                                                htmlspecialchars($cahier->contenu)
                                            );
                                            ?>

                                        </div>

                                    </td>


                                    <!-- Travail -->
                                    <td>

                                        <?php if (!empty($cahier->travailafaire)) : ?>

                                            <div style="max-width:250px;">

                                                <?php
                                                echo nl2br(
                                                    htmlspecialchars(
                                                        $cahier->travailafaire
                                                    )
                                                );
                                                ?>

                                            </div>

                                        <?php else : ?>

                                            <span class="text-muted">
                                                Aucun travail
                                            </span>

                                        <?php endif; ?>

                                    </td>


                                    <!-- Actions -->
                                    <td class="text-center">

                                        <div class="btn-group">

                                            <!-- Modifier -->
                                            <?php echo anchor(
                                                'saisircahiertexte/update/'
                                                . $cahier->matrienseignant . '/'
                                                . $cahier->idclasse . '/'
                                                . $cahier->idmatiere . '/'
                                                . $cahier->datecours,
                                                '<i class="bi bi-pencil"></i>',
                                                'class="btn btn-warning btn-sm" title="Modifier"'
                                            ); ?>


                                            <!-- Supprimer -->
                                            <?php echo anchor(
                                                'saisircahiertexte/delete/'
                                                . $cahier->matrienseignant . '/'
                                                . $cahier->idclasse . '/'
                                                . $cahier->idmatiere . '/'
                                                . $cahier->datecours,
                                                '<i class="bi bi-trash"></i>',
                                                'class="btn btn-danger btn-sm"
                                                 title="Supprimer"
                                                 onclick="return confirm(\'Voulez-vous vraiment supprimer ?\');"'
                                            ); ?>

                                        </div>

                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        <?php else : ?>

                            <tr>

                                <td colspan="6" class="text-center py-5">

                                    <i class="bi bi-journal-x display-5 text-muted"></i>

                                    <p class="mt-3 mb-0 text-muted">
                                        Aucun cours enregistré pour cette journée.
                                    </p>

                                </td>

                            </tr>

                        <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>