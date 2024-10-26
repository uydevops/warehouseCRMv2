@foreach($employees as $employee)
<div class="modal fade" id="editUserModal{{ $employee->id }}" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Çalışanı Düzenle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('employees.update') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $employee->id }}">
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label for="name" class="form-label">Çalışan Adı</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $employee->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="leave_days" class="form-label">Kullanılan İzin Günleri</label>
                        <input type="number" class="form-control" id="leave_days" name="leave_days" value="{{ $employee->leave_days }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="annual_leave_days" class="form-label">İzin Günleri</label>
                        <input type="text" class="form-control" id="annual_leave_days" name="annual_leave_days" value="{{ $employee->annual_leave_days }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="created_at" class="form-label">İşe Giriş Tarihi</label>
                        <input type="date" class="form-control" id="created_at" name="created_at" value="{{ $employee->created_at }}" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                    <button type="submit" class="btn btn-primary">Güncelle</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
