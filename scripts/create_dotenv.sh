cat << EOF > .env
APP_NAME=${APP_NAME}
APP_ENV=${APP_ENV}
APP_KEY=${APP_KEY}
APP_DEBUG=${APP_DEBUG}
APP_URL=${APP_URL}

LOG_CHANNEL=${LOG_CHANNEL}

DB_CONNECTION=${DB_CONNECTION}
DB_HOST=${DB_HOST}
DB_PORT=${DB_PORT}
DB_DATABASE=${DB_DATABASE}
DB_USERNAME=${DB_USERNAME}
DB_PASSWORD=${DB_PASSWORD}

BROADCAST_DRIVER=${BROADCAST_DRIVER}
CACHE_DRIVER=${CACHE_DRIVER}
QUEUE_CONNECTION=${QUEUE_CONNECTION}
SESSION_DRIVER=${SESSION_DRIVER}
SESSION_LIFETIME=${SESSION_LIFETIME}

REDIS_HOST=${REDIS_HOST}
REDIS_PASSWORD=${REDIS_PASSWORD}
REDIS_PORT=${REDIS_PORT}

MAIL_DRIVER=${MAIL_DRIVER}
MAIL_HOST=${MAIL_HOST}
MAIL_PORT=${MAIL_PORT}
MAIL_USERNAME=${MAIL_USERNAME}
MAIL_PASSWORD=${MAIL_PASSWORD}
MAIL_ENCRYPTION=${MAIL_ENCRYPTION}

AWS_ACCESS_KEY_ID=${AWS_ACCESS_KEY_ID}
AWS_SECRET_ACCESS_KEY=${AWS_SECRET_ACCESS_KEY}
AWS_DEFAULT_REGION=${AWS_DEFAULT_REGION}
AWS_BUCKET=${AWS_BUCKET}

PUSHER_APP_ID=${PUSHER_APP_ID}
PUSHER_APP_SECRET=${PUSHER_APP_SECRET}
PUSHER_APP_CLUSTER=${PUSHER_APP_CLUSTER}

MIX_PUSHER_APP_KEY=${MIX_PUSHER_APP_KEY}
MIX_PUSHER_APP_CLUSTER="${MIX_PUSHER_APP_CLUSTER}
EOF
