<?php
return (object) [
  'scopes' => (object) [
    'Email' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'Team' => (object) [
      'read' => 'all'
    ],
    'User' => (object) [
      'read' => 'all',
      'edit' => 'own'
    ],
    'Calendar' => true,
    'Call' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'Case' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'all',
      'delete' => 'no',
      'create' => 'yes'
    ],
    'Meeting' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'no',
      'delete' => 'no',
      'create' => 'no'
    ],
    'Task' => (object) [
      'read' => 'all',
      'stream' => 'all',
      'edit' => 'own',
      'delete' => 'no',
      'create' => 'no'
    ],
    'Import' => false,
    'Webhook' => false,
    'Currency' => false,
    'EmailAccountScope' => false,
    'EmailTemplate' => false,
    'EmailTemplateCategory' => false,
    'ExternalAccount' => false,
    'Template' => false,
    'WorkingTimeCalendar' => false,
    'Account' => false,
    'Activities' => false,
    'Campaign' => false,
    'Contact' => false,
    'Document' => false,
    'DocumentFolder' => false,
    'KnowledgeBaseArticle' => false,
    'KnowledgeBaseCategory' => false,
    'Lead' => false,
    'Opportunity' => false,
    'TargetList' => false,
    'Target' => false,
    'Note' => (object) [
      'read' => 'own',
      'edit' => 'own',
      'delete' => 'own',
      'create' => 'yes'
    ],
    'Portal' => (object) [
      'read' => 'all',
      'edit' => 'no',
      'delete' => 'no',
      'create' => 'no'
    ],
    'Attachment' => (object) [
      'read' => 'own',
      'edit' => 'own',
      'delete' => 'own',
      'create' => 'yes'
    ],
    'EmailAccount' => (object) [
      'read' => 'own',
      'edit' => 'own',
      'delete' => 'own',
      'create' => 'yes'
    ],
    'EmailFilter' => (object) [
      'read' => 'own',
      'edit' => 'own',
      'delete' => 'own',
      'create' => 'yes'
    ],
    'EmailFolder' => (object) [
      'read' => 'own',
      'edit' => 'own',
      'delete' => 'own',
      'create' => 'yes'
    ],
    'GroupEmailFolder' => (object) [
      'read' => 'team',
      'edit' => 'no',
      'delete' => 'no',
      'create' => 'no'
    ],
    'Preferences' => (object) [
      'read' => 'own',
      'edit' => 'own',
      'delete' => 'no',
      'create' => 'no'
    ],
    'Notification' => (object) [
      'read' => 'own',
      'edit' => 'no',
      'delete' => 'own',
      'create' => 'no'
    ],
    'ActionHistoryRecord' => (object) [
      'read' => 'own'
    ],
    'Role' => false,
    'PortalRole' => false,
    'ImportError' => false,
    'WorkingTimeRange' => false,
    'Stream' => true,
    'MassEmail' => false,
    'CampaignLogRecord' => false,
    'CampaignTrackingUrl' => false,
    'EmailQueueItem' => false
  ],
  'fields' => (object) [
    'Currency' => (object) [],
    'Email' => (object) [
      'inboundEmails' => (object) [
        'read' => 'no',
        'edit' => 'no'
      ],
      'emailAccounts' => (object) [
        'read' => 'no',
        'edit' => 'no'
      ]
    ],
    'EmailTemplate' => (object) [],
    'EmailTemplateCategory' => (object) [],
    'ExternalAccount' => (object) [],
    'Import' => (object) [],
    'Team' => (object) [],
    'Template' => (object) [],
    'User' => (object) [
      'gender' => (object) [
        'read' => 'no',
        'edit' => 'no'
      ],
      'dashboardTemplate' => (object) [
        'read' => 'no',
        'edit' => 'no'
      ],
      'workingTimeCalendar' => (object) [
        'read' => 'yes',
        'edit' => 'no'
      ],
      'password' => (object) [
        'read' => 'no',
        'edit' => 'no'
      ],
      'passwordConfirm' => (object) [
        'read' => 'no',
        'edit' => 'no'
      ],
      'auth2FA' => (object) [
        'read' => 'no',
        'edit' => 'no'
      ],
      'authMethod' => (object) [
        'read' => 'no',
        'edit' => 'no'
      ],
      'apiKey' => (object) [
        'read' => 'no',
        'edit' => 'no'
      ],
      'secretKey' => (object) [
        'read' => 'no',
        'edit' => 'no'
      ],
      'token' => (object) [
        'read' => 'no',
        'edit' => 'no'
      ]
    ],
    'Webhook' => (object) [],
    'WorkingTimeCalendar' => (object) [],
    'Account' => (object) [],
    'Call' => (object) [],
    'Campaign' => (object) [],
    'Case' => (object) [
      'priority' => (object) [
        'read' => 'yes',
        'edit' => 'yes'
      ],
      'status' => (object) [
        'read' => 'yes',
        'edit' => 'yes'
      ]
    ],
    'Contact' => (object) [],
    'Document' => (object) [],
    'DocumentFolder' => (object) [],
    'KnowledgeBaseArticle' => (object) [],
    'KnowledgeBaseCategory' => (object) [],
    'Lead' => (object) [],
    'Meeting' => (object) [],
    'Opportunity' => (object) [],
    'TargetList' => (object) [],
    'Task' => (object) [],
    'ActionHistoryRecord' => (object) [
      'authToken' => (object) [
        'read' => 'no',
        'edit' => 'no'
      ],
      'authLogRecord' => (object) [
        'read' => 'no',
        'edit' => 'no'
      ]
    ],
    'EmailAccount' => (object) [
      'assignedUser' => (object) [
        'read' => 'yes',
        'edit' => 'no'
      ]
    ],
    'EmailFolder' => (object) [
      'assignedUser' => (object) [
        'read' => 'yes',
        'edit' => 'no'
      ]
    ]
  ],
  'permissions' => (object) [
    'assignment' => 'all',
    'user' => 'all',
    'portal' => 'yes',
    'groupEmailAccount' => 'no',
    'export' => 'no',
    'massUpdate' => 'no',
    'followerManagement' => 'no',
    'dataPrivacy' => 'no'
  ]
];
