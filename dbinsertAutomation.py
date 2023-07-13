# List of tag names
tag_names = ["HTML", "JavaScript", "CSS", "Python"]

# Generate the INSERT INTO queries
queries = []
for index, tag_name in enumerate(tag_names):
    tag_id = index + 1
    insert_query = "INSERT INTO tag (tag_id, tag_name) VALUES ({}, '{}');".format(tag_id, tag_name)
    queries.append(insert_query)

# Output the generated queries
for query in queries:
    print(query)  