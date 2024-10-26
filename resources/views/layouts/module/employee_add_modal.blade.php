<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserModalLabel">Yeni Çalışan Ekle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('employees.add') }}" method="POST">
                @csrf
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label for="name" class="form-label">Çalışan Adı</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="leave_days" class="form-label">Kullanılan İzin Günleri</label>
                        <input type="number" class="form-control" id="leave_days" name="leave_days" required>
                    </div>
                    <div class="mb-3">
                        <label for="annual_leave_days" class="form-label">Yıllık İzin Günleri</label>
                        <input type="text" class="form-control" id="annual_leave_days" name="annual_leave_days" required>
                    </div>
                    <div class="mb-3">
                        <label for="created_at" class="form-label">İşe Giriş Tarihi</label>
                        <input type="date" class="form-control" id="created_at" name="created_at" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                    <button type="submit" class="btn btn-primary">Kaydet</button>
                </div>
            </form>
        </div>
    </div>
</div>
