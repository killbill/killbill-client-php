#!/bin/sh

killBillUrl='http://127.0.0.1:8080'

# Generate
java -jar swagger-codegen-cli.jar generate \
  --input-spec $killBillUrl/swagger.json \
  --lang php \
  --config .swagger-config.json \
  --type-mappings BigDecimal=float \
  --template-dir ./templates \
  --output .
