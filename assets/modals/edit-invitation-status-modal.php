<div class="modal fade" id="editInvitationStatusModal" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="post" id="insertComplaint">
                <div class="modal-header">
                    <h4 class="modal-title font-weight-bold">Change Status</h4>
                    <button type="button" class="close align-self-center" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="inv_id">
                    <dl>
                        <dt>Complainant</dt>
                        <dd class="complainant"></dd>
                        <dt>Respondent</dt>
                        <dd class="respondent"></dd>
                    </dl>
                    <div class="hide-on-summon">
                        <div class="h6 font-weight-bold mb-2">Status</div>
                        <button class="btn btn-sm btn-primary w-100 mb-2 ongoing">Ongoing</button>
                        <div class="btn btn-sm btn-success w-100 mb-2 settled">Settled</div>
                        <div class="btn btn-sm btn-danger w-100 summon">Proceed to Summon</div>
                    </div>
                    <div class="show-on-summon">
                        <div class="h4 text-center">File Complaint</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm text-gray-900" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-warning btn-sm" name="submit" value="Submit">
                </div>
            </form>
        </div>

    </div>
</div>

<script>
    $(document).ready(function() {
        $('.ongoing').on('click', function(e) {
            e.preventDefault()
            var status = 0;
            var id = $('input#inv_id').val()
            swal.fire({
                title: "Change status to Ongoing?",
                icon: 'question',
                showCancelButton: !0,
                confirmButtonText: "Yes, continue!",
                confirmButtonColor: '#dc3545',
                cancelButtonText: "No, wait go back!",
                reverseButtons: !0
            }).then(function(e) {
                if (e.value === true) {
                    $.ajax({
                        type: 'POST',
                        url: "config/queries/edit-invitation-status-query.php",
                        data: {
                            'status': status,
                            'inv_id': id
                        },
                        success: function(data) {
                            var response = JSON.parse(data);
                            console.log(data);
                            if (response.success_flag == 0) {
                                toastr.error(response.message)
                            } else {
                                toastr.success(response.message);

                                setTimeout(function() {
                                    window.location.reload();
                                }, 2000);
                            }
                        }
                    });
                } else {
                    e.dismiss;
                }
            }, function(dismiss) {
                return false;
            })
        })
        $('.settled').on('click', function(e) {
            e.preventDefault()
            var status = 1;
            var id = $('input#inv_id').val()
            swal.fire({
                title: "Change status to Settled?",
                icon: 'question',
                showCancelButton: !0,
                confirmButtonText: "Yes, continue!",
                confirmButtonColor: '#dc3545',
                cancelButtonText: "No, wait go back!",
                reverseButtons: !0
            }).then(function(e) {
                if (e.value === true) {
                    $.ajax({
                        type: 'POST',
                        url: "config/queries/edit-invitation-status-query.php",
                        data: {
                            'status': status,
                            'inv_id': id
                        },
                        success: function(data) {
                            var response = JSON.parse(data);
                            console.log(data);
                            if (response.success_flag == 0) {
                                toastr.error(response.message)
                            } else {
                                toastr.success(response.message);

                                setTimeout(function() {
                                    window.location.reload();
                                }, 2000);
                            }
                        }
                    });
                } else {
                    e.dismiss;
                }
            }, function(dismiss) {
                return false;
            })
        })
        $('.summon').on('click', function(e) {
            e.preventDefault()
            var status = 2;
            var id = $('input#inv_id').val()
            swal.fire({
                title: "Proceed to Summon?",
                icon: 'question',
                showCancelButton: !0,
                confirmButtonText: "Yes, continue!",
                confirmButtonColor: '#dc3545',
                cancelButtonText: "No, wait go back!",
                reverseButtons: !0
            }).then(function(e) {
                if (e.value === true) {
                    // $.ajax({
                    //     type: 'POST',
                    //     url: "config/queries/edit-invitation-status-query.php",
                    //     data: {'status' : status, 'inv_id' : id},
                    //     success: function(data) {
                    //         var response = JSON.parse(data);
                    //         console.log(data);
                    //         if (response.success_flag == 0) {
                    //             toastr.error(response.message)
                    //         } else {
                    //             toastr.success(response.message);

                    //             setTimeout(function() {
                    //                 window.location.reload();
                    //             }, 2000);
                    //         }
                    //     }
                    $('.hide-on-summon').addClass('d-none')
                    $('#editInvitationStatusModal').find('.modal-title').text('Wiw')
                } else {
                    e.dismiss;
                }
            }, function(dismiss) {
                return false;
            })
        })
    })
</script>