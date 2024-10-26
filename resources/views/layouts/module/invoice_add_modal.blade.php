<div class="modal fade" id="addInvoiceModal" tabindex="-1" role="dialog" aria-labelledby="addInvoiceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addInvoiceModalLabel">Yeni Fatura Ekle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('invoices.add') }}" method="POST">
                @csrf
                <div class="modal-body p-4">
                    <table class="table table-bordered" id="invoice-table">
                        <thead>
                            <tr>
                                <th>Fatura Türü</th>
                                <th>Tutar</th>
                                <th>KDV Oranı</th>
                                <th>Son Ödeme Tarihi</th>
                                <th>Ödeme Yöntemi</th>
                                <th>Notlar</th>
                                <th>Personel</th>
                                <th>İşlemler</th>
                            </tr>
                        </thead>
                        <tbody id="invoices-wrapper">
                            <tr class="invoice-item">
                                <td>
                                    <select class="form-select" name="type[]" onchange="handleTypeChange(this)">
                                        <option value="iş yeri gideri">İş Yeri Gideri</option>
                                        <option value="personel gideri">Personel Gideri</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="number" class="form-control" name="amount[]" step="0.01" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control" name="vat_rate[]" step="0.01" value="18" required>
                                </td>
                                <td>
                                    <input type="datetime-local" class="form-control" name="due_date[]">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="payment_method[]">
                                </td>
                                <td>
                                    <textarea class="form-control" name="notes[]" rows="1"></textarea>
                                </td>
                                <td class="personel-field" style="display: none;">
                                    
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger" onclick="removeInvoiceItem(this)">Sil</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-success" onclick="addInvoiceItem()">Yeni Fatura Ekle</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                    <button type="submit" class="btn btn-primary">Kaydet</button>
                </div>
            </form>
        </div>
    </div>
</div>
<style>
    .modal-xl {
        max-width: 90%;
    }

    .invoice-item td {
        vertical-align: middle;
    }
    
</style>
<script>
    function handleTypeChange(selectElement) {
        const invoiceItem = selectElement.closest('.invoice-item');
        const personelField = invoiceItem.querySelector('.personel-field');
        if (selectElement.value === 'personel gideri') {
            personelField.style.display = 'table-cell';
        } else {
            personelField.style.display = 'none';
        }
    }

    function addInvoiceItem() {
        const invoiceWrapper = document.getElementById('invoices-wrapper');
        const newInvoiceItem = invoiceWrapper.querySelector('.invoice-item').cloneNode(true);
        newInvoiceItem.querySelectorAll('input, textarea, select').forEach(input => {
            input.value = '';
        });
        newInvoiceItem.querySelector('.personel-field').style.display = 'none';
        invoiceWrapper.appendChild(newInvoiceItem);
    }

    function removeInvoiceItem(button) {
        const invoiceItem = button.closest('.invoice-item');
        if (document.querySelectorAll('.invoice-item').length > 1) {
            invoiceItem.remove();
        } else {
            alert('En az bir fatura girilmelidir.');
        }
    }
</script>
