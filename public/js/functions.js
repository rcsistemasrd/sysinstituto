function loadDatatables() {
    const datatable = $('.datatable')

    if (datatable.length == 0) {
        return false
    }

    const base_url = datatable.attr('base_url')
    const edit_url = datatable.attr('edit_url')
    const code_column = datatable.attr('code_column')

    let columns = renderColumns(datatable, edit_url, code_column)

    datatable.DataTable({
        ajax: base_url,
        processing: true,
        serverSide: true,
        language: {
            url: window.base_url + '/plug-ins/1.10.19/i18n/Spanish.json'
        },
        columns
    })
}

function renderColumns(datatable, edit_url, code) {
    let columns = []
    const additional_links = datatable.attr('additional_links')
    const additional_links_icons = datatable.attr('additional_links_icons')

    datatable
        .attr('columns')
        .split(',')
        .forEach(function(column, index) {
            if (column.search('@') >= 0) {
                columns_parts = column.split('@')

                column = columns_parts[0]
                format = columns_parts[1]

                if (format == 'number') {
                    columns.push({
                        data: column,
                        render: $.fn.dataTable.render.number(',', '.', 2, ''),
                        className: 'text-right'
                    })
                }

                if (format == 'date') {
                    columns.push({
                        data: column,
                        render: $.fn.dataTable.render.moment('DD/MM/YYYY'),
                        className: 'text-center'
                    })
                }
            } else {
                columns.push({
                    data: column
                })
            }
        })

    columns.push({
        render(data, type, row) {
            _edit_url = edit_url.replace('_id', row[code])

            return renderEditButton(_edit_url)
        }
    })

    if (additional_links) {
        const icons = additional_links_icons.split('|')

        additional_links.split('|').forEach(function(link, index) {
            columns.push({
                render(data, type, row) {
                    _link = link.replace('__id', row[code])

                    return renderButton(_link, icons[index])
                }
            })
        })
    }

    return columns
}

function renderEditButton(edit_url) {
    return `<a class="" href="${edit_url}"><i class="fas fa-fw fa-edit"></i></a>`
}

function renderButton(url, icon) {
    return `<a class="" href="${url}"><i class="fas fa-fw fa-${icon}"></i></a>`
}

function formToDelete(deleteForm) {
    $('#submit_' + deleteForm).click(() => {
        $('form[name=form-' + deleteForm + ']').submit(() => {
            $('input[name=_method]').val('DELETE')
        })
    })
}

function format_number(number, currency = 'DOP') {
    return number.toLocaleString('es-DO', {
        maximumFractionDigits: 2,
        style: 'currency',
        currency: currency
    })
}
