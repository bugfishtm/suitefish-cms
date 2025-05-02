#!/bin/bash

echo "Checking restart policies for running containers:"
echo "------------------------------------------------"

docker ps --format '{{.Names}}' | while read -r container; do
    policy=$(docker inspect -f "{{.HostConfig.RestartPolicy.Name}}" "$container")
    if [ "$policy" == "no" ]; then
        echo "❌ $container: No restart policy set"
    else
        echo "✅ $container: Restart policy - $policy"
    fi
done

echo "------------------------------------------------"
echo "Script completed."
