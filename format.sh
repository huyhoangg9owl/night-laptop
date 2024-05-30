#!/bin/bash

clear

start_time=$(date +%s)

file_path=$1

file_content=$(cat "$file_path")

mkdir -p formatted

folder_name=$(basename "$file_path")

mkdir -p formatted/"$folder_name"

class_lines=$(echo "$file_content" | grep -oP 'class="[^"]*"' | sed 's/class=//g' | sed 's/"//g')

IFS=$'\n' read -d '' -r -a class_lines <<<"$class_lines"

function ProgressBar {
    _progress=$(($1 * 100 / $2))
    _done=$((_progress * 4 / 10))
    _left=$((40 - "$_done"))

    _fill=$(printf "%${_done}s")
    _empty=$(printf "%${_left}s")

    printf "\r[${_fill// /#}${_empty// /-}] ${_progress}%%"
}

_start=1

_end=${#class_lines[@]}

for class_line in "${class_lines[@]}"; do
    file_name=$(date +%s%N)
    child_file_path="formatted/$folder_name/$file_name.html"

    class_line=$(echo "$class_line" | sed 's/\["/'\''/g' | sed 's/"]/'\''/g')
    html="<div class=\"$class_line\"></div>"
    echo "$html" >"$child_file_path"
    npx prettier -w "$child_file_path" --config ./.prettierrc --log-level silent

    child_file_content=$(cat "$child_file_path")

    formatted_class_line=$(echo "$child_file_content" | grep -oP 'class="[^"]*"' | sed 's/class=//g' | sed 's/"//g')

    escaped_class_line=$(printf '%s\n' "$class_line" | sed 's/[]\/$*.^|[]/\\&/g')
    escaped_formatted_class_line=$(printf '%s\n' "$formatted_class_line" | sed 's/[]\/$*.^|[]/\\&/g')

    sed -i "s/$escaped_class_line/$escaped_formatted_class_line/g" "$file_path"
    ProgressBar "$_start" "$_end"
    _start=$((_start + 1))
done

rm -rf formatted

clear

echo "Formatted done successfully"
echo "Time taken: $(($(date +%s) - start_time)) seconds"
