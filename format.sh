#!/bin/bash

file_path=$1

file_content=$(cat "$file_path")

mkdir -p formatted

folder_name=$(basename "$file_path")

mkdir -p formatted/"$folder_name"

class_lines=$(echo "$file_content" | grep -oP 'class="[^"]*"' | sed 's/class=//g' | sed 's/"//g')

IFS=$'\n' read -d '' -r -a class_lines <<< "$class_lines"

for class_line in "${class_lines[@]}"
do
	file_name=$(date +%s%N)
	child_file_path="formatted/$folder_name/$file_name.html"

	class_line=$(echo "$class_line" | sed 's/\["/'\''/g' | sed 's/"]/'\''/g')
	html="<div class=\"$class_line\"></div>"
	echo "$html" > "$child_file_path"
	npx prettier -w "$child_file_path" --config ./.prettierrc

	child_file_content=$(cat "$child_file_path")


	formatted_class_line=$(echo "$child_file_content" | grep -oP 'class="[^"]*"' | sed 's/class=//g' | sed 's/"//g')

	escaped_class_line=$(printf '%s\n' "$class_line" | sed 's/[]\/$*.^|[]/\\&/g')
	escaped_formatted_class_line=$(printf '%s\n' "$formatted_class_line" | sed 's/[]\/$*.^|[]/\\&/g')

	sed -i "s/$escaped_class_line/$escaped_formatted_class_line/g" "$file_path"

done

rm -rf formatted
