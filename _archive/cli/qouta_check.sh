#!/bin/bash

# Enable strict mode
set -euo pipefail

# File to store temporary quota information
QUOTA_FILE="/tmp/suitefishcli_sc_quota_info.txt"

# Threshold for quota usage warning (in percentage)
THRESHOLD=80

# Function to send email
send_email() {
    local user="$1"
    local type="$2"  # Type of quota ("block" or "inode")
    local usage="$3"
    local limit="$4"
    echo "Quota warning for $user: $type quota exceeded ($usage% of $limit used)"
    # Uncomment the following line to actually send an email
    # echo "Quota warning for $user: $type quota exceeded ($usage% of $limit used)" | mail -s "Quota Warning" "$user@example.com"
}

# Get all quota information and filter out header lines
/usr/sbin/repquota -a | awk 'NR>3' > "$QUOTA_FILE"

# Process each line in the quota file
while IFS= read -r line; do
    # Extract user and quota information
    read -r user _ block_used block_soft block_hard inode_used inode_soft inode_hard <<< "$line"

    # Skip lines where no limits are set or values are invalid
    if [[ "$block_soft" == "-" && "$block_hard" == "-" && "$inode_soft" == "-" && "$inode_hard" == "-" ]]; then
        continue
    fi

    # Check block quotas (soft and hard limits)
	if [[ "$block_soft" != "-" && "$block_soft" =~ ^[0-9]+$ && "$block_soft" -ne 0 ]]; then
		block_usage=$(( (block_used * 100) / block_soft ))
		if [ "$block_usage" -gt "$THRESHOLD" ]; then
			send_email "$user" "block (soft)" "$block_usage" "$block_soft"
		fi
	fi

	if [[ "$block_hard" != "-" && "$block_hard" =~ ^[0-9]+$ && "$block_hard" -ne 0 ]]; then
		if [[ "$block_hard" != "-" && "$block_hard" =~ ^[0-9]+$ ]]; then
			block_usage=$(( (block_used * 100) / block_hard ))
			if [ "$block_usage" -ge 80 ]; then
				send_email "$user" "block (hard)" "$block_usage" "$block_hard"
			fi
		fi
	fi

    # Check inode quotas (soft and hard limits)
	if [[ "$inode_soft" != "-" && "$inode_soft" =~ ^[0-9]+$ && "$inode_soft" -ne 0 ]]; then
		if [[ "$inode_soft" != "-" && "$inode_soft" =~ ^[0-9]+$ ]]; then
			inode_usage=$(( (inode_used * 100) / inode_soft ))
			if [ "$inode_usage" -gt "$THRESHOLD" ]; then
				send_email "$user" "inode (soft)" "$inode_usage" "$inode_soft"
			fi
		fi
	fi

	if [[ "$inode_hard" != "-" && "$inode_hard" =~ ^[0-9]+$ && "$inode_hard" -ne 0 ]]; then
		if [[ "$inode_hard" != "-" && "$inode_hard" =~ ^[0-9]+$ ]]; then
			inode_usage=$(( (inode_used * 100) / inode_hard ))
			if [ "$inode_usage" -ge 80 ]; then
				send_email "$user" "inode (hard)" "$inode_usage" "$inode_hard"
			fi
		fi
	fi

done < "$QUOTA_FILE"

# Clean up temporary file
rm -f "$QUOTA_FILE"
