<?php

return [
    'invoices' => [
        'title' => 'Счета',
        'single' => 'Счет',
        'widgets' => [
            'count' => 'Всего счетов',
            'paid' => 'Всего оплачено',
            'due' => 'Всего к оплате'
        ],
        'columns' => [
            'uuid' => 'ID счета',
            'name' => 'Имя клиента',
            'phone' => 'Номер телефона',
            'address' => 'Адрес',
            'date' => 'Дата счета',
            'due_date' => 'Дата оплаты',
            'type' => 'Тип счета',
            'status' => 'Статус',
            'currency_id' => 'Валюта',
            'items' => 'Товары в счете',
            'item' => 'Товар',
            'item_name' => 'Название товара',
            'description' => 'Описание',
            'qty' => 'Количество',
            'price' => 'Цена',
            'discount' => 'Скидка',
            'vat' => 'НДС',
            'total' => 'Итого',
            'shipping' => 'Доставка',
            'notes' => 'Заметки',
            'account' => 'Счет',
            'by' => 'от',
            'from' => 'От',
            'paid' => 'Оплачено',
            'updated_at' => 'Обновлено'
        ],
        'sections' => [
            'from_type' => [
                'title' => 'Тип отправителя',
                'columns' => [
                    'from_type' => 'Тип отправителя',
                    'from' => 'От кого',
                ],
            ],
            'billed_from' => [
                'title' => 'Выставлен для',
                'columns' => [
                    'for_type' => 'Тип кому выставляется',
                    'for' => 'Для кого',
                ],
            ],
            'customer_data' => [
                'title' => 'Данные клиента',
                'columns' => [
                    'name' => 'Имя',
                    'phone' => 'Телефон',
                    'address' => 'Адрес',
                ],
            ],
            'invoice_data' => [
                'title' => 'Данные счета',
                'columns' => [
                    'date' => 'Дата',
                    'due_date' => 'Дата оплаты',
                    'type' => 'Тип',
                    'status' => 'Статус',
                    'currency' => 'Валюта',
                ],
            ],
            'totals' => [
                'title' => 'Итоги'
            ],
        ],
        'filters' => [
            'status' => 'Статус',
            'type' => 'Тип',
            'due' => [
                'label' => 'Дата оплаты',
                'columns' => [
                    'overdue' => 'Просрочено',
                    'today' => 'Сегодня',
                ]
            ],
            'for' => [
                'label' => 'Фильтр по "Для"',
                'columns' => [
                    'for_type' => 'Тип "Для"',
                    'for_name' => 'Имя "Для"',
                ]
            ],
            'from' => [
                'label' => 'Фильтр по "От"',
                'columns' => [
                    'from_type' => 'Тип "От"',
                    'from_name' => 'Имя "От"',
                ]
            ],
        ],
        'actions' => [
            'total' => 'Итого',
            'paid' => 'Оплачено',
            'amount' => 'Сумма',
            'view_invoice' => 'Просмотреть счет',
            'edit_invoice' => 'Редактировать счет',
            'archive_invoice' => 'Архивировать счет',
            'delete_invoice_forever' => 'Удалить счет навсегда',
            'restore_invoice' => 'Восстановить счет',
            'invoices_status' => 'Статус счетов',
            'print' => 'Печать',
            'pay' => [
                'label' => 'Оплатить счет',
                'notification' => [
                    'title' => 'Счет оплачен',
                    'body' => 'Счет успешно оплачен'
                ]
            ],
            'status' => [
                'title' => 'Статус',
                'label' => 'Изменить статус',
                'tooltip' => 'Изменить статус выбранных счетов',
                'form' => [
                    'model_id' => 'Пользователи',
                    'model_type' => 'Тип пользователя',
                ],
                'notification' => [
                    'title' => 'Статус изменен',
                    'body' => 'Статус успешно изменен'
                ]
            ],
        ],
        'logs' => [
            'title' => 'Логи счета',
            'single' => 'Лог счета',
            'columns' => [
                'log' => 'Лог',
                'type' => 'Тип',
                'created_at' => 'Создано'
            ],
        ],
        'payments' => [
            'title' => 'Платежи',
            'single' => 'Платеж',
            'columns' => [
                'amount' => 'Сумма',
                'created_at' => 'Создано'
            ],
        ],
        'view' => [
            'bill_from' => 'Счет от',
            'bill_to' => 'Счет для',
            'invoice' => 'Счет',
            'issue_date' => 'Дата выставления',
            'due_date' => 'Дата оплаты',
            'status' => 'Статус',
            'type' => 'Тип',
            'item' => 'Товар',
            'total' => 'Итого',
            'price' => 'Цена',
            'vat' => 'НДС',
            'discount' => 'Скидка',
            'qty' => 'Кол-во',
            'bank_account' => 'Банковский счет',
            'name' => 'Имя',
            'address' => 'Адрес',
            'branch' => 'Филиал',
            'swift' => 'SWIFT',
            'account' => 'Счет',
            'owner' => 'Владелец',
            'iban' => 'IBAN',
            'signature' => 'Подпись',
            'subtotal' => 'Подытог',
            'tax' => 'Налог',
            'paid' => 'Оплачено',
            'balance_due' => 'Остаток к оплате',
            'notes' => 'Заметки',
        ]
    ],
    'settings' => [
        'status' => [
            'title' => 'Настройки статуса счета',
            'description' => 'Измените цвета и текст статуса вашего заказа',
            'action' => [
                'edit' => 'Редактировать статус',
                'notification' => 'Статус успешно обновлен',
            ],
            'columns' => [
                'status' => 'Статус',
                'icon' => 'Иконка',
                'color' => 'Цвет',
                'language' => 'Язык',
                'value' => 'Значение',
            ]
        ],
    ],
];

